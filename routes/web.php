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

    // Return JSON with redirect URL so AJAX login can handle navigation.
    return match ($user->course_type) {
        'student_Acc'   => response()->json(['success' => true, 'redirect' => route('studentDashAcc')]),
        'student_Psych' => response()->json(['success' => true, 'redirect' => route('studentDashPsych')]),
        'student_Educ'  => response()->json(['success' => true, 'redirect' => route('studentDashEduc')]),
        'Teacher'       => response()->json(['success' => true, 'redirect' => route('StudentDashTeach')]),
        'Admin'         => response()->json(['success' => true, 'redirect' => route('adminDash')]),
        default         => abort(403),
    };
});


Route::get('/student/acc', fn () => view('StudentDashAcc'))->name('studentDashAcc');
Route::get('/student/psych', fn () => view('StudentDashPsych'))->name('studentDashPsych');
Route::get('/student/educ', fn () => view('StudentDashEduc'))->name('studentDashEduc');
Route::get('/admin', fn () => view('AdminDash'))->name('adminDash');
Route::get('/teacher/studentdashteach', fn () => view('StudentDashTeach'))->name('StudentDashTeach');