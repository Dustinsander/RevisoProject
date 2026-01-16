<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User; // assuming you have a User model

class LoginController extends Controller
{
    public function check(Request $request)
    {
        $validated = $request->validate([
            'idNumber' => 'required',
            'password' => 'required',
        ]);

        $user = User::where('user_id', $validated['idNumber'])->first();

        if (!$user || !Hash::check($validated['password'], $user->password)) {
            return response()->json(['success' => false], 401);
        }

        // Return JSON with redirect URL so AJAX login can handle navigation.
        return match ($user->course_type) {
            'student_Acc'   => response()->json(['success' => true, 'redirect' => route('studentDashAcc')]),
            'student_Psych' => response()->json(['success' => true, 'redirect' => route('studentDashPsych')]),
            'student_Educ'  => response()->json(['success' => true, 'redirect' => route('studentDashEduc')]),
            'student_Teach' => response()->json(['success' => true, 'redirect' => route('StudentDashTeach')]),
            'Admin'         => response()->json(['success' => true, 'redirect' => route('adminDash')]),
            default         => abort(403),
        };
    }
}
