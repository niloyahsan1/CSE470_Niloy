<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Goal;
use App\Models\Profile;
use Illuminate\Http\Request;

class loginauth extends Controller
{
    public function auth(Request $request)
    {
        $email = $request->input('email');
        $pass = $request->input('pass');

        $userInfo = User::where('email', $email)->first();

        if ($userInfo) {
            if ($pass == $userInfo -> pass) {
                if ($userInfo->ptype == 'Customer') {
                    return view('profile', ['email' => $email]);
                } elseif ($userInfo->ptype == 'Consultant') {
                    return view('consultant', ['email' => $email]);
                }
            } else {
                return view('login');
            }
        }
        return view('login');

    }

    public function show_home(Request $request)
    {
        $email = $request->only('email');
        $age = $request->only('age');
        $goal = $request->only('goal');
        // return $age;
        
        $GoalInfo = Goal::where('email', $email)->first();
        $goal = $GoalInfo->weight;
        
        $ProfileInfo = Profile::where('email', $email)->first();
        $age = $ProfileInfo->age;

        return view('customer', ['age' => $age, 'email' => $email, 'goal' => $goal]);
    }



    public function sign(Request $request)
    {
        $fname = $request->input('fname');
        $lname = $request->input('lname');
        $username = $request->input('username');
        $email = $request->input('email');
        $ptype = $request->input('ptype');
        $pass = $request->input('pass');


        $userInfo = User::create([
            'fname' => $fname,
            'lname' => $lname,
            'username' => $username,
            'email' => $email,
            'ptype' => $ptype,
            'pass' => $pass,
        ]);
        if ($ptype == "Customer"){
            return redirect()->route('profile_show', ['email' => $email]);
        }
        else{
            return view('consultantpage', ['email' => $email]);
        }
    }
}
