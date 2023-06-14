<?php

namespace App\Http\Controllers;

use App\Jobs\ActiveUsersJob;
use App\Jobs\SendMailJob;
use App\Mail\SendMailUsers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function index() {
        ActiveUsersJob::dispatch();

        return 'User updated successsfully';
    }

    public function sendMail() {
        $data = [
            'elhdadmustafa@gmail.com', 'elhdadmustafa@gmail.com','elhdadmustafa@gmail.com',
            'elhdadmustafa@gmail.com', 'elhdadmustafa@gmail.com','elhdadmustafa@gmail.com',
            'elhdadmustafa@gmail.com', 'elhdadmustafa@gmail.com','elhdadmustafa@gmail.com',
            'elhdadmustafa@gmail.com', 'elhdadmustafa@gmail.com','elhdadmustafa@gmail.com',
        ];

        SendMailJob::dispatch($data);

        return 'User updated successsfully';
    }
}
