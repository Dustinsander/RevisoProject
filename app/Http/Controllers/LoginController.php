<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User; // assuming you have a User model

class LoginController extends Controller
{
    public function check(Request $request)
    {
        $idNumber = $request->input('idNumber');
        $password = $request->input('password');

        $user = User::where('id_number', $idNumber)->first();

        if ($user && Hash::check($password, $user->password)) {
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false]);
    }
}
