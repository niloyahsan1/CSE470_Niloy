<?php

namespace App\Http\Controllers;

use App\Models\Goal;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GoalController extends Controller
{
    public function showGoalForm(Request $request)
    {
        $email = $request->only('email');
        $age = $request->only('age');

        // return $email;
        return view('goal', ['email' => $email['email'], 'age' => $age['age']]);
    }

    public function setGoal(Request $request)
    {
        // Validate the form data here as needed

        $email = $request->only('email');
        $age = $request->only('age');
        // return $age;

        // $user = auth()->user();
        $goal = $request->input('weight');
        // $user->save();

        $user = Goal::create([
            'email' => $email['email'],
            'weight' => $goal,
        ]);

        // Optionally, you can redirect to another page or show a success message
        return redirect()->route('table', ['weight' => $goal, 'email' => $email['email'], 'age' => $age['age']]);
    }

    public function goaldone(Request $request)
    {
        $email = $request->only('email');
        $age = $request->only('age');
        $goal = $request->only('weight');

        //getting the email and do query
        $customer_info = Profile::where('email', $email)->first();
        $hh = $customer_info->height;
        $h = $hh * 0.0254;
        $w = $customer_info->current_weight;
        $b = $w / ($h * $h);
        $BMI = round($b);

        if ($BMI < 18) {
            $show = "Underweight";
        } elseif (18 <= $BMI and $BMI <= 25) {
            $show = "Normal Weight";
        } elseif (26 <= $BMI and $BMI <= 30) {
            $show = "Overweight";
        } elseif (31 <= $BMI and $BMI <= 35) {
            $show = "Obese";
        } elseif (36 <= $BMI) {
            $show = "Extremely Obese";
        }


        if ($BMI < 18) {
            $do = "Increase";
        } elseif ($BMI > 26) {
            $do = "Decrease";
        } else {
            $do = "Nothing";
        }
        
        return view('goaldone', ['do' => $do, 'show' => $show, 'BMI' => $BMI, 'age' => $age['age'], 'email' => $email['email'], 'goal' => $goal['weight']]);
    }
    
    public function notungoal(Request $request)
    {
        
        $email = $request->only('email');
        $age = $request->only('age');
        $goal = $request->only('goal');
        $do = $request->only('do');

    // -------------------------------------------------------------------------------------
        $customer_info = Profile::where('email', $email)->first();
        $hh = $customer_info->height;
        $h = $hh * 0.0254;
        $w = $customer_info->current_weight;
        $b = $w / ($h * $h);
        $BMI = round($b);

        if ($BMI < 18) {
            $show = "Underweight";
        } elseif (18 <= $BMI and $BMI <= 25) {
            $show = "Normal Weight";
        } elseif (26 <= $BMI and $BMI <= 30) {
            $show = "Overweight";
        } elseif (31 <= $BMI and $BMI <= 35) {
            $show = "Obese";
        } elseif (36 <= $BMI) {
            $show = "Extremely Obese";
        }


        if ($BMI < 18) {
            $do = "Increase";
        } elseif ($BMI > 26) {
            $do = "Decrease";
        } else {
            $do = "Nothing";
        }
    // -----------------------------------------------------------------------------

        if ($goal['goal'] == 'Increase' && $do == 'Decrease') {
            Goal::where('email', $email)->update(['weight' => $do]);

        } elseif ($goal['goal'] == 'Decrease' && $do == 'Increase') {
            Goal::where('email', $email)->update(['weight' => $do]);
        }

        return view('goaldone', ['goal' => $do, 'email' => $email['email'], 'age' => $age['age'], 'BMI' => $BMI, 'show' => $show, 'do' => 'Nothing']);
    }
}
