<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function all()
    {
        $users = User::all();
        return view('user-admin', ['data' => $users]); ;

    }
    public function del(Book $book)
    {

        $book->delete();
        return redirect()->back();

    }
}
