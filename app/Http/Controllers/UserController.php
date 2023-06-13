<?php

namespace App\Http\Controllers;

use App\Jobs\ActiveUsersJob;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        ActiveUsersJob::dispatch();

        return 'User updated successsfully';
    }
}
