<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

Route::get('/', function () {
    return view('Login');
});

Route::post('/login-check', [LoginController::class, 'check']);

Route::post('/login-check', function (Request $request) {
    $validated = $request->validate([
        'idNumber' => 'required',
        'password' => 'required',
    ]);

    $user = DB::table('users')
        ->where('user_id', $validated['idNumber'])
        ->first();

    if (!$user || !Hash::check($validated['password'], $user->password)) {
        return response()->json(['success' => false], 401);
    }

    return match ($user->role) {
        'student_Acc'   => redirect()->route('studentDashAcc'),
        'student_Psych' => redirect()->route('studentDashPsych'),
        'student_Teach' => redirect()->route('studentDashTeach'),
        'Teacher'       => redirect()->route('teacherDash'),
        'Admin'         => redirect()->route('adminDash'),
        default         => abort(403),
    };
});


Route::get('/student/acc', fn () => view('StudentDashAcc'))->name('studentDashAcc');
Route::get('/student/psych', fn () => view('StudentDashPsych'))->name('studentDashPsych');
Route::get('/student/teach', fn () => view('StudentDashTeach'))->name('studentDashTeach');
Route::get('/teacher', fn () => view('TeacherDash'))->name('teacherDash');
Route::get('/admin', fn () => view('AdminDash'))->name('adminDash');