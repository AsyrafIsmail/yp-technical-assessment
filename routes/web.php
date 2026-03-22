<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Lecturer\ClassroomController;
use App\Http\Controllers\Lecturer\SubjectController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', function () {

        $user = Auth::user();

        if ($user->role === 'lecturer') {
            return redirect()->route('lecturer.dashboard');
        }

        return redirect()->route('student.dashboard');

    })->name('dashboard');

    Route::get('/lecturer/dashboard', function () {

        if (Auth::user()->role !== 'lecturer') {
            abort(403);
        }

        return view('lecturer.dashboard');

    })->name('lecturer.dashboard');

    Route::get('/student/dashboard', function () {

        if (Auth::user()->role !== 'student') {
            abort(403);
        }

        return view('student.dashboard');

    })->name('student.dashboard');

    Route::prefix('lecturer')->group(function () {
        Route::resource('classes', ClassroomController::class);
        Route::resource('subjects', SubjectController::class);
    });

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

require __DIR__.'/auth.php';
