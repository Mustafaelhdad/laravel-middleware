<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class anotherTestController extends Controller
{
    public function index() {
        // $user = User::where('name', auth()->user()->name)->get();
        // $user = User::where('name', username())->get();
        $user = User::where('id', user_id())->get();
        return $user;
    }
}
