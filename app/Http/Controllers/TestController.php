<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Traits\TestTrait;
use Illuminate\Http\Request;

class TestController extends Controller
{
    use TestTrait;

    public function index() {
        $users = $this->getData(new User());

        return $users;
    }
}
