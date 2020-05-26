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

    public function show($params)
    {
        $id = $params[0];
        $type = $params[1];
        if ((Auth::user()->id == $id) || in_array(User::getRole(Auth::user()), ['Superuser', 'Readers admin']))
        {
            if ($type == 1)
            {

                return view('records.lent', compact(''));
            }
            else
            {

                return view('records.returned', compact(''));
            }
        }
        return redirect()->route('home');
    }
}
