<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Lent;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', [
            'except' => ['store']
        ]);
    }

    public function createReader()
    {
        if (in_array(User::getRole(Auth::user()), ['Superuser', 'Readers admin']))
            return view('users.createReader');
        return redirect()->route('home');
    }

    public function createAdmin()
    {
        if (User::getRole(Auth::user()) == 'Superuser')
            return view('users.createAdmin');
        return redirect()->route('home');
    }

    public function indexReaders(Request $request)
    {
        if (in_array(User::getRole(Auth::user()), ['Superuser', 'Readers admin']))
        {
            $id = $request->input('id');
            $name = $request->input('name');
            $users = User::where('authority', '0');
            if ($id)
                $users = $users->where('id', '=', $id);
            if ($name)
                $users = $users->where('name', 'like', '%' . $name . '%');
            $users = $users->paginate(10);
            return view('users.indexReaders', compact('users'));
        }
        return redirect()->route('home');
    }

    public function indexAdmins(Request $request)
    {
        if (User::getRole(Auth::user()) == 'Superuser')
        {
            $role = $request->input('role');
            $id = $request->input('id');
            $name = $request->input('name');
            $users = User::where('authority', '>=', '1');
            if ($role)
                $users = $users->where('authority', '=', $role);
            if ($id)
                $users = $users->where('id', '=', $id);
            if ($name)
                $users = $users->where('name', 'like', '%' . $name . '%');
            $users = $users->paginate(10);
            return view('users.indexAdmins', compact('users'));
        }
        return redirect()->route('home');
    }

    public function show(User $user)
    {
        $this->authorize('show', $user);
        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        $this->authorize('update', $user);
        return view('users.edit', compact('user'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'id' => 'required|unique:users|max:15',
            'name' => 'required|max:20',
            'email' => 'required|email|unique:users|max:255',
            'phone' => 'required|unique:users|max:11',
            'password' => 'required|confirmed|min:6'
        ]);

        $user = User::create([
            'id' => $request->id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => bcrypt($request->password),
            'authority' => $request->authority ? $request->authority : 0
        ]);

        session()->flash('success', 'Creation succeeded.');
        return redirect()->route('users.show', [$user]);
    }

    public function update(User $user, Request $request)
    {
        $this->authorize('update', $user);
        if ($request->pay) {
            $user->update([
                'debt' => 0,
            ]);
            session()->flash('success', 'Payment succeeded.');
            return redirect()->route('users.show', $user);
        }

        $this->validate($request, [
            'email' => 'required|email|max:255',
            'phone' => 'required|max:11',
            'password' => 'nullable|confirmed|min:6'
        ]);

        $data = [];
        if (User::getRole($user) != 'Superuser')
            $data['authority'] = $request->authority ? $request->authority : 0;
        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        }
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $user->update($data);

        session()->flash('success', 'Update succeeded.');
        return redirect()->route('users.show', $user);
    }

    public function destroy(User $user)
    {
        if (Lent::where('uid', '=', $user->id)->count())
        {
            session()->flash('danger', 'Borrowed records of this user exist.');
            return back();
        }
        $this->authorize('destroy', $user);
        $user->delete();
        session()->flash('success', 'Deletion succeeded.');
        return back();
    }
}
