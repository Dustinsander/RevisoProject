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

    $user = DB::table('users')->where('user_id', $validated['idNumber'])->first();

    if ($user && Hash::check($validated['password'], $user->password)) {
        return response()->json(['success' => true]);
    }

    return response()->json(['success' => false], 401);
});