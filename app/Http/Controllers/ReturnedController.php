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

class ReturnedController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', [
            'except' => []
        ]);
    }

    public function create()
    {
        return view('returned.create');
    }

    public function index()
    {
        $categories = DB::table('returned')->paginate(10);
        return view('returned.index', compact('returned'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'bid' => 'required|max:10',
        ]);
        if (Book::where('id', '=', $request->bid)->exists() == 0) {
            session()->flash('warning', 'This book doesn\'t exist.');
            return back();
        }
        $lent = Lent::where('uid', '=', Auth::user()->id)->where('bid', '=', $request->bid)->first();
        if (empty($lent)) {
            session()->flash('warning', 'You have not borrowed this book.');
            return back();
        }
        Returned::create([
            'uid' => $lent->uid,
            'bid' => $lent->bid,
            'lent_at' => $lent->lent_at,
            'returned_at' => Carbon::now(),
        ]);
        $lent->delete();
        $book = Book::where('id', '=', $request->bid)->first();
        $bookInfo = BookInfo::where('isbn', '=', $book->isbn)->first();
        $bookInfo->update([
            'available' => $bookInfo->available + 1,
        ]);
        session()->flash('success', 'Returning succeeded.');
        return redirect()->route('home');
    }

    public function destroy(Lent $lent)
    {
        if (in_array(User::getRole(Auth::user()), ['Superuser', 'Readers admin'])) {
            $lent->delete();
            session()->flash('success', 'Deletion succeeded.');
            return back();
        }
    }
}
