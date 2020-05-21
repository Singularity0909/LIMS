<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Book;
use App\Models\BookInfo;
use App\Models\Lent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class LentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', [
            'except' => []
        ]);
    }

    public function create()
    {
        return view('lent.create');
    }

    public function index()
    {
        $categories = DB::table('lent')->paginate(10);
        return view('lent.index', compact('lent'));
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
        if (Lent::where('bid', '=', $request->bid)->exists()) {
            session()->flash('warning', 'Someone has already borrowed this book.');
            return back();
        }
        if (Auth::user()->debt > 0) {
            session()->flash('warning', 'Please pay off your debt first.');
            return back();
        }
        Lent::create([
            'uid' => Auth::user()->id,
            'bid' => $request->bid,
            'lent_at' => Carbon::now(),
            'due_at' => Carbon::now()->addMonth(1),
        ]);
        $book = Book::where('id', '=', $request->bid)->first();
        $bookInfo = BookInfo::where('isbn', '=', $book->isbn)->first();
        $bookInfo->update([
            'available' => $bookInfo->available - 1,
        ]);
        session()->flash('success', 'Borrowing succeeded.');
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
