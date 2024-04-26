<?php

namespace App\Http\Controllers;

use App\Models\Goal;
use App\Models\Profile;
use Illuminate\Http\Request;

class Home extends Controller
{
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
}
