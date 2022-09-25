<?php

use App\Mail\SignupMailable;
use App\Models\Interest;
use App\Models\Language;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('form');

Route::get('readme', function () {
    return view('readme');
})->name('readme');

Route::get('/dashboard', function () {
    return view(
        'dashboard'
    );
})->middleware(['auth'])->name('dashboard');

Route::get('/languages', function () {
    return view(
        'languages'
    );
})->middleware(['auth'])->name('languages');
Route::get('/interests', function () {
    return view(
        'interests'
    );
})->middleware(['auth'])->name('interests');


Route::post('/signup', function (Request $request) {
    $signup = $request->validate([
        'name' => 'required',
        'email' => 'required|email',
    ]);

    Mail::to('johandanielbothma@gmail.com')->send(new SignupMailable($signup));
    // Mail::to('johandanielbothma@gmail.com'->send(new ))

    return back()->with('notification', 'emailed!');
});

require __DIR__ . '/auth.php';
