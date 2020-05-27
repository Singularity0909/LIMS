<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Book;
use App\Models\BookInfo;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BooksController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', [
            'except' => []
        ]);
    }

    public function create()
    {
        if (in_array(User::getRole(Auth::user()), ['Superuser', 'Books admin']))
        {
            $categories = Category::all();
            return view('books.create')->with('categories', $categories);
        }
        return redirect()->route('home');
    }

    public function index()
    {
        if (@$_GET['category'] && @$_GET['keywords'])
            $books = BookInfo::where('category', '=', $_GET['category'])->where('title', 'like', '%' . $_GET['keywords'] . '%')->paginate(10);
        else if (@$_GET['keywords'])
            $books = BookInfo::where('title', 'like', '%'.$_GET['keywords'].'%')->paginate(10);
        else if (@$_GET['category'])
            $books = BookInfo::where('category', '=', $_GET['category'])->paginate(10);
        else
            $books = DB::table('books_info')->paginate(10);
        return view('books.index', compact('books'));
    }

    public function show(BookInfo $book)
    {
        return view('books.show', compact('book'));
    }

    public function edit(BookInfo $book)
    {
        if (in_array(User::getRole(Auth::user()), ['Superuser', 'Books admin']))
        {
            $categories = Category::all();
            return view('books.edit', compact('book'))->with('categories', $categories);
        }
        return redirect()->route('home');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'isbn' => 'required|integer|digits:13',
            'title' => 'required|max:20',
            'category' => 'required|integer',
            'author' => 'required|max:20',
            'publisher' => 'required|max:50',
            'cover' => 'max:255',
            'intro' => 'max:255',
            'price' => 'required|numeric|max:255',
            'amount' => 'required|integer',
            'location' => 'required|max:20'
        ]);

        $book = BookInfo::where('isbn', '=', $request->isbn)->first();
        if ($book === null) {
            $book = BookInfo::create([
                'isbn' => $request->isbn,
                'title' => $request->title,
                'category' => $request->category,
                'author' => $request->author,
                'publisher' => $request->publisher,
                'cover' => $request->cover,
                'intro' => $request->intro,
                'price' => $request->price,
                'total' => $request->amount,
                'available' => $request->amount,
                'location' => $request->location
            ]);
        }

        else {
            $data = [];
            $data['total'] = $book->total + $request->amount;
            $data['available'] = $book->available + $request->amount;
            $book->update($data);
        }

        for ($i = 0; $i < $request->amount; $i++) {
            Book::create([
                'isbn' => $request->isbn
            ]);
        }

        session()->flash('success', 'Creation succeeded.');
        return redirect()->route('books.show', [$book]);
    }

    public function update(BookInfo $book, Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:20',
            'category' => 'required|integer',
            'author' => 'required|max:20',
            'publisher' => 'required|max:50',
            'cover' => 'max:255',
            'intro' => 'max:255',
            'price' => 'required|numeric|max:255',
            'location' => 'required|max:20'
        ]);
        $book->update([
            'title' => $request->title,
            'category' => $request->category,
            'author' => $request->author,
            'publisher' => $request->publisher,
            'cover' => $request->cover,
            'intro' => $request->intro,
            'price' => $request->price,
            'location' => $request->location,
        ]);
        session()->flash('success', 'Update succeeded.');
        return redirect()->route('books.show', [$book]);
    }

    public function destroy(BookInfo $book)
    {
        if (in_array(User::getRole(Auth::user()), ['Superuser', 'Books admin'])) {
            $book->delete();
            session()->flash('success', 'Deletion succeeded.');
            return back();
        }
    }
}
