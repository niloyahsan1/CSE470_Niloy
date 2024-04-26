<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profile_done(Request $request)
    {
        $email = $request->only('email');
        $age = $request->only('age');
        $goal = $request->only('weight');

        // doing query from profile and user table by <<email>>
        $cuspro = Profile::where('email', $email)->first();
        $cusinfo = User::where('email', $email)->first();

        return view('profiledone', ['cuspro' => $cuspro, 'cusinfo' => $cusinfo, 'age' => $age['age'], 'email' => $email['email'], 'goal' => $goal['weight']]);
    }

    public function showProfileForm(Request $request)
    {
        $email = $request->only('email');
        
        return view('profile', ['email' => $email['email']]);
        // return $email;
    }
    
    public function updateProfile(Request $request)
    {
        
        $email = $request->only('email');
        $age = $request->input('age');
        $gender = $request->input('gender');
        $height = $request->input('height');
        $current_weight = $request->input('current_weight');
        $user = Profile::create([
            'email' => $email['email'],
            'age' => $age,
            'height' => $height,
            'current_weight' => $current_weight,
            'gender' => $gender,
        ]);

        return redirect()->route('goal.show', ['email' => $email['email'], 'age' => $age]);
    }
}
