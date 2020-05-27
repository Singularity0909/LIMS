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

    public function show($param)
    {
        $uid = substr($param, 0, strlen($param) - 1);
        $type = substr($param, -1);
        if ((Auth::user()->id == $uid) || in_array(User::getRole(Auth::user()), ['Superuser', 'Readers admin']))
        {
            if ($type == 1)
            {
                $records = DB::select("SELECT books.id AS bid, books_info.isbn AS isbn, title, lent_at, due_at, renewed FROM users, books, books_info, lent WHERE users.id = :uid AND users.id = lent.uid AND books.id = lent.bid AND books.isbn = books_info.isbn ORDER BY lent_at", ['uid' => $uid]);
                return view('records.lent', compact('records', 'uid'));
            }
            else
            {
                $records = DB::select("SELECT books.id AS bid, books_info.isbn AS isbn, title, lent_at, returned_at FROM users, books, books_info, returned WHERE users.id = :uid AND users.id = returned.uid AND books.id = returned.bid AND books.isbn = books_info.isbn ORDER BY lent_at", ['uid' => $uid]);
                return view('records.returned', compact('records', 'uid'));
            }
        }
        return redirect()->route('home');
    }
}
