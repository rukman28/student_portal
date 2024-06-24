<?php

use App\Http\Controllers\admin\ProgrammeController;
use App\Models\admin\Programme;
use Illuminate\Support\Facades\Route;


Route::prefix('admin')->middleware('auth:admin')->group(function () {

    Route::resource('programme', ProgrammeController::class)->only('index');
});
