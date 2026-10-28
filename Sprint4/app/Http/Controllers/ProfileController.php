<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profile_done(Request $request)
    {
        $user = auth()->user() ?? User::where('email', $request->input('email'))->first();
        if (!$user) {
            return redirect()->route('login');
        }

        $cuspro = $user->profile;
        $cusinfo = $user;

        $age = $cuspro ? $cuspro->age : null;
        $goal = $user->goal ? $user->goal->weight : null;

        return view('profile_summary', [
            'cuspro' => $cuspro,
            'cusinfo' => $cusinfo,
            'age' => $age,
            'email' => $user->email,
            'goal' => $goal
        ]);
    }

    public function showProfileForm(Request $request)
    {
        $email = auth()->user() ? auth()->user()->email : $request->input('email');
        return view('profile', ['email' => $email]);
    }
    
    public function updateProfile(UpdateProfileRequest $request)
    {
        $user = auth()->user();
        $email = $user ? $user->email : $request->input('email');
        $validated = $request->validated();

        Profile::updateOrCreate(
            ['email' => $email],
            [
                'age' => $validated['age'],
                'height' => $validated['height'],
                'current_weight' => $validated['current_weight'],
                'gender' => $validated['gender'],
            ]
        );

        return redirect()->route('goal.show');
    }
}
