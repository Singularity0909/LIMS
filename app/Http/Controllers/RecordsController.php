<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Book;
use App\Models\BookInfo;
use App\Models\Lent;
use App\Models\Returned;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class RecordsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', [
            'except' => []
        ]);
    }

    public function index(Request $request)
    {
        $isbn = $request->input('isbn');
        $uid = $request->input('uid');
        $type = $request->input('type');
        if ((Auth::user()->id == $uid) || in_array(User::getRole(Auth::user()), ['Superuser', 'Books admin', 'Readers admin']))
        {
            if ($isbn && $type == 1)
            {
                $records = DB::select("SELECT books.id AS bid, users.id AS uid, name, lent_at, due_at FROM users, books, books_info, lent WHERE books.isbn = :isbn AND users.id = lent.uid AND books.id = lent.bid AND books.isbn = books_info.isbn ORDER BY lent_at", ['isbn' => $isbn]);
                return view('records.lentByBook', compact('records', 'isbn'));
            }
            else if ($isbn && $type == 2)
            {
                $records = DB::select("SELECT books.id AS bid, users.id AS uid, name, lent_at, returned_at FROM users, books, books_info, returned WHERE books.isbn = :isbn AND users.id = returned.uid AND books.id = returned.bid AND books.isbn = books_info.isbn ORDER BY lent_at", ['isbn' => $isbn]);
                return view('records.returnedByBook', compact('records', 'isbn'));
            }
            else if ($type == 1)
            {
                $records = DB::select("SELECT books.id AS bid, books_info.isbn AS isbn, title, lent_at, due_at, renewed FROM users, books, books_info, lent WHERE users.id = :uid AND users.id = lent.uid AND books.id = lent.bid AND books.isbn = books_info.isbn ORDER BY lent_at", ['uid' => $uid]);
                return view('records.lentByUser', compact('records', 'uid'));
            }
            else
            {
                $records = DB::select("SELECT books.id AS bid, books_info.isbn AS isbn, title, lent_at, returned_at FROM users, books, books_info, returned WHERE users.id = :uid AND users.id = returned.uid AND books.id = returned.bid AND books.isbn = books_info.isbn ORDER BY lent_at", ['uid' => $uid]);
                return view('records.returnedByUser', compact('records', 'uid'));
            }
        }
        return redirect()->route('home');
    }
}
