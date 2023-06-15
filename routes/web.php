<?php

use App\Http\Controllers\anotherTestController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use App\Mail\AnotherMarkDown;
use App\Mail\MarkDownEmail;
use App\Mail\TestMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use PHPUnit\Framework\Attributes\PostCondition;

use Illuminate\Support\Facades\Storage;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/send', function () {
//     Mail::to("elhdadmustafa@gmail.com")->send(new AnotherMarkDown());

//     return response("Email sent!");
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route::get('/posts', [PostController::class, 'index'])->middleware('check_user');
Route::resource('posts', PostController::class);
Route::get('notification/mark-as-read', [PostController::class, 'markAsRead'])->name('notification.mark');

Route::get('test', [TestController::class, 'index']);
Route::get('anothertest', [anotherTestController::class, 'index']);

Route::get('users', [UserController::class, 'index']);
Route::get('sendmail', [UserController::class, 'sendMail']);

Route::get ('storage', function() {
    Storage::disk('local')->put('example.txt', 'Content');
    return "OK";
});

require __DIR__.'/auth.php';
