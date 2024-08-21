<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Mail\MailTestMessage;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
    ->name('home')
    ->middleware('verified');

Route::resource('/task', TaskController::class)->middleware('verified');

Route::get('/test-message', function () {
    $userMail = auth()->user()->email;

    Mail::to($userMail)->send(new MailTestMessage());
    return 'Email successfully sent!';
})->middleware('auth');