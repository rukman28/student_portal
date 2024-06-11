<?php

use Illuminate\Support\Facades\Route;



Route::get('/admin/Login', function () {
    return view('admin.login');
})->name('admin.login');
