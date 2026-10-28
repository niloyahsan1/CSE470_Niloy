<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Goal;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function auth(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'pass' => ['required'],
        ]);

        if (Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['pass']])) {
            $request->session()->regenerate();
            $user = Auth::user();

            if ($user->ptype === 'Customer') {
                return redirect()->route('home');
            } elseif ($user->ptype === 'Consultant') {
                return view('consultant', ['email' => $user->email]);
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

    public function sign(Request $request)
    {
        $validated = $request->validate([
            'fname' => ['required', 'string', 'max:50'],
            'lname' => ['nullable', 'string', 'max:50'],
            'username' => ['required', 'string', 'max:50'],
            'email' => ['required', 'email', 'max:50', 'unique:signup_table,email'],
            'ptype' => ['required', 'string', 'in:Customer,Consultant'],
            'pass' => ['required', 'string', 'min:6'],
        ]);

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
            return view('consultantpage', ['email' => $user->email]);
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
