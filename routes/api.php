<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;

Route::get('/palindrome', [TestController::class, 'palindrome'])->name("palindrome");
Route::get('/seconds', [TestController::class, 'secondsPassed'])->name("secondsPassed");
Route::get('/text', [TestController::class, 'textOnly'])->name("textOnly");