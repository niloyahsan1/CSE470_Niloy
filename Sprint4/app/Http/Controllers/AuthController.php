<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Models\Goal;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function auth(LoginRequest $request)
    {
        $credentials = $request->validated();

        if (Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['pass']])) {
            $request->session()->regenerate();
            $user = Auth::user();

            if ($user->ptype === 'Customer') {
                return redirect()->route('home');
            } elseif ($user->ptype === 'Consultant') {
                return redirect()->route('consultant.dashboard');
            }
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function show_home(Request $request)
    {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login');
        }

        $email = $user->email;
        $GoalInfo = Goal::where('email', $email)->latest('id')->first();
        $goal = $GoalInfo ? $GoalInfo->weight : null;

        $ProfileInfo = Profile::where('email', $email)->latest('id')->first();
        $age = $ProfileInfo ? $ProfileInfo->age : null;

        return view('customer', ['age' => $age, 'email' => $email, 'goal' => $goal]);
    }

    public function sign(RegisterRequest $request)
    {
        $validated = $request->validated();

        $user = User::create([
            'fname' => $validated['fname'],
            'lname' => $validated['lname'] ?? '',
            'username' => $validated['username'],
            'email' => $validated['email'],
            'ptype' => $validated['ptype'],
            'pass' => Hash::make($validated['pass']),
        ]);

        Auth::login($user);
        $request->session()->regenerate();

        if ($user->ptype === 'Customer') {
            return redirect()->route('profile_show');
        } else {
            return redirect()->route('consultant.dashboard');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
