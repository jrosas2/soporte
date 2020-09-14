<?php

use Illuminate\Support\Facades\Route;


Route::view('/', 'welcome')->name('welcome');
Route::view('/mail', 'emails.MailClient')->name('MailClient');


Route::post('contact', 'MessageController@store')->name('messages.store');

// Route::view('/about', 'about')->name('about');
// Route::view('/services', 'services')->name('services');
// Route::view('/contact', 'contact')->name('contact');

// // Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', function () {
//     return "hola desde la pagina de inicio";
// });