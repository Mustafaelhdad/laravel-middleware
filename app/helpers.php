<?php

use Illuminate\Support\Facades\Auth;

if(! function_exists('username')) {
    function username() {
        return Auth::User()->name;
    }
}

if(! function_exists('user_id')) {
    function user_id() {
        return Auth::User()->id;
    }
}
