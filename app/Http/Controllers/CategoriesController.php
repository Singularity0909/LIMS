<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CategoriesController extends Controller
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
            return view('categories.create');
        return redirect()->route('home');
    }

    public function index()
    {
        $categories = DB::table('categories')->paginate(10);
        return view('categories.index', compact('categories'));
    }

    public function edit(Category $category)
    {
        if (in_array(User::getRole(Auth::user()), ['Superuser', 'Books admin']))
            return view('categories.edit', compact('category'));
        return redirect()->route('home');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:20',
        ]);
        $category = Category::create([
            'name' => $request->name,
        ]);
        session()->flash('success', 'Creation succeeded.');
        return redirect()->route('categories.index');
    }

    public function update(Category $category, Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:20',
        ]);
        $category->update([
            'name' => $request->name,
        ]);
        session()->flash('success', 'Update succeeded.');
        return redirect()->route('categories.index');
    }

    public function destroy(Category $category)
    {
        if (in_array(User::getRole(Auth::user()), ['Superuser', 'Books admin'])) {
            $category->delete();
            session()->flash('success', 'Deletion succeeded.');
            return back();
        }
    }
}
