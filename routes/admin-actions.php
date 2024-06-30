<?php

use App\Http\Controllers\Admin\ModuleController;
use App\Http\Controllers\Admin\PracticalController;
use App\Http\Controllers\Admin\ProgrammeController;
use App\Http\Controllers\Admin\SkillCategoryController;
use App\Http\Controllers\Admin\SkillController;
use App\Models\admin\Programme;
use App\Models\admin\Skill;
use Illuminate\Support\Facades\Route;


Route::prefix('admin')->middleware('auth:admin')->group(function () {

    Route::resource('programme', ProgrammeController::class)->only('index', 'destroy', 'create', 'store', 'show', 'edit', 'update');
    Route::resource('module', ModuleController::class)->only('index', 'destroy', 'create', 'store', 'show', 'edit', 'update');
    Route::resource('practical', PracticalController::class)->only('index', 'destroy', 'create', 'store', 'show', 'edit', 'update');
    Route::resource('skillcategory', SkillCategoryController::class)->only('index', 'destroy', 'create', 'store', 'show', 'edit', 'update');
    Route::resource('skill', SkillController::class)->only('index', 'destroy', 'create', 'store', 'show', 'edit', 'update');
});
