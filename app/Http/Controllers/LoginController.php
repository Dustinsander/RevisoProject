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
            if ($user->course_type === 'psych') {
                return redirect()->route('psych.dashboard');
            }

            if (in_array($user->course_type, ['Accountant', 'student_Acc'])) {
                return redirect()->route('accountant.dashboard');
            }

            if ($user->course_type === 'Teacher') {
                return redirect()->route('teach.dashboard');
            }
             if ($user->course_type === 'student_Educ') {
                return redirect()->route('educ.dashboard');
            }


            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false]);
    }
}
