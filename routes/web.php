<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Lecturer\ClassroomController;
use App\Http\Controllers\Lecturer\ExamController;
use App\Http\Controllers\Lecturer\QuestionController;
use App\Http\Controllers\Lecturer\SubjectController;
use App\Http\Controllers\Lecturer\StudentController;
use App\Models\Classroom;
use App\Models\Subject;
use App\Models\Exam;
use App\Models\Answer;

use App\Http\Controllers\Student\ExamController as StudentExamController;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {

    // Dashboard redirect
    Route::get('/dashboard', function () {
        $user = Auth::user();

        if ($user->role === 'lecturer') {
            return redirect()->route('lecturer.dashboard');
        }

        return redirect()->route('student.dashboard');
    })->name('dashboard');

    // Lecturer dashboard
    Route::get('/lecturer/dashboard', function () {
        if (Auth::user()->role !== 'lecturer') {
            abort(403);
        }
        return view('lecturer.dashboard', [
            'classesCount' => Classroom::count(),
            'subjectsCount' => Subject::count(),
            'examsCount' => Exam::count(),
        ]);
    })->name('lecturer.dashboard');

    // Student dashboard
    Route::get('/student/dashboard', function () {
        if (Auth::user()->role !== 'student') {
            abort(403);
        }
        $exams = Exam::where('classroom_id', Auth::user()->classroom_id)->get();

        $completed = 0;

        foreach ($exams as $exam) {

            $answered = Answer::where('user_id', Auth::user()->id)
                ->whereHas('question', function ($q) use ($exam) {
                    $q->where('exam_id', $exam->id);
                })
                ->exists();

            $exam->answered = $answered;

            if ($answered) {
                $completed++;
            }
        }

        return view('student.dashboard', [
            'exams' => $exams->take(5), // show only latest 5
            'totalExams' => $exams->count(),
            'completedExams' => $completed,
            'pendingExams' => $exams->count() - $completed,
        ]);
    })->name('student.dashboard');

    // Lecturer Routes
    Route::prefix('lecturer')->group(function () {
        Route::resource('classes', ClassroomController::class);
        Route::resource('subjects', SubjectController::class);
        Route::resource('exams', ExamController::class);

        // Questions
        Route::get('exams/{exam}/questions/create', [QuestionController::class, 'create'])->name('questions.create');
        Route::post('exams/{exam}/questions', [QuestionController::class, 'store'])->name('questions.store');

        // Students management
        Route::get('students', [StudentController::class, 'index'])->name('students.index');
        Route::get('students/{id}', [StudentController::class, 'show'])->name('students.show');
        Route::post('students/{id}', [StudentController::class, 'update'])->name('students.update');
    });

    // Student Routes
    Route::prefix('student')->group(function () {
        Route::get('exams', [StudentExamController::class, 'index'])->name('student.exams');
        Route::get('exams/{id}', [StudentExamController::class, 'show'])->name('student.exam.start');
        Route::post('exams/{id}', [StudentExamController::class, 'submit'])->name('student.exam.submit');
    });

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

require __DIR__.'/auth.php';
