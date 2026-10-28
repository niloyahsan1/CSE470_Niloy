<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profile_done(Request $request)
    {
        $user = auth()->user();
        $email = $user ? $user->email : $request->input('email');

        $cuspro = Profile::where('email', $email)->latest('id')->first();
        $cusinfo = $user ?? User::where('email', $email)->first();

        $age = $cuspro ? $cuspro->age : null;
        $goalRecord = \App\Models\Goal::where('email', $email)->latest('id')->first();
        $goal = $goalRecord ? $goalRecord->weight : null;

        return view('profiledone', [
            'cuspro' => $cuspro,
            'cusinfo' => $cusinfo,
            'age' => $age,
            'email' => $email,
            'goal' => $goal
        ]);
    }

    public function showProfileForm(Request $request)
    {
        $email = auth()->user() ? auth()->user()->email : $request->input('email');
        return view('profile', ['email' => $email]);
    }
    
    public function updateProfile(Request $request)
    {
        $email = auth()->user() ? auth()->user()->email : $request->input('email');
        $age = $request->input('age');
        $gender = $request->input('gender');
        $height = $request->input('height');
        $current_weight = $request->input('current_weight');

        Profile::create([
            'email' => $email,
            'age' => $age,
            'height' => $height,
            'current_weight' => $current_weight,
            'gender' => $gender,
        ]);

        return redirect()->route('goal.show');
    }
}
