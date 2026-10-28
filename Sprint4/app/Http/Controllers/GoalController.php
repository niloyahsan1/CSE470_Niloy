<?php

namespace App\Http\Controllers;

use App\Models\Goal;
use App\Models\Profile;
use App\Services\BmiService;
use Illuminate\Http\Request;

class GoalController extends Controller
{
    protected BmiService $bmiService;

    public function __construct(BmiService $bmiService)
    {
        $this->bmiService = $bmiService;
    }

    public function showGoalForm(Request $request)
    {
        $user = auth()->user() ?? Profile::where('email', $request->input('email'))->first();
        $email = $user ? $user->email : $request->input('email');
        $profile = ($user instanceof \App\Models\User) ? $user->profile : Profile::where('email', $email)->latest('id')->first();
        $age = $profile ? $profile->age : $request->input('age');

        return view('goal', ['email' => $email, 'age' => $age]);
    }

    public function setGoal(Request $request)
    {
        $user = auth()->user();
        $email = $user ? $user->email : $request->input('email');
        $goal = $request->input('weight');

        Goal::updateOrCreate(
            ['email' => $email],
            ['weight' => $goal]
        );

        return redirect()->route('table');
    }

    public function goaldone(Request $request)
    {
        $user = auth()->user();
        $email = $user ? $user->email : $request->input('email');

        $customer_info = ($user && $user->profile) ? $user->profile : Profile::where('email', $email)->latest('id')->first();
        if (!$customer_info) {
            return redirect()->route('profile_show')->with('error', 'Please complete your profile first.');
        }

        $goalRecord = ($user && $user->goal) ? $user->goal : Goal::where('email', $email)->latest('id')->first();
        $goal = $goalRecord ? $goalRecord->weight : null;
        $age = $customer_info->age;

        $bmi = $this->bmiService->calculate($customer_info->height, $customer_info->current_weight);
        $show = $this->bmiService->getCategory($bmi);
        $do = $this->bmiService->getRecommendedAction($bmi);

        return view('goaldone', [
            'do' => $do,
            'show' => $show,
            'BMI' => round($bmi),
            'age' => $age,
            'email' => $email,
            'goal' => $goal
        ]);
    }

    public function notungoal(Request $request)
    {
        $user = auth()->user();
        $email = $user ? $user->email : $request->input('email');

        $customer_info = Profile::where('email', $email)->latest('id')->first();
        if (!$customer_info) {
            return redirect()->route('profile_show')->with('error', 'Please complete your profile first.');
        }

        $goalRecord = Goal::where('email', $email)->latest('id')->first();
        $currentGoal = $goalRecord ? $goalRecord->weight : $request->input('goal');
        $age = $customer_info->age;

        $bmi = $this->bmiService->calculate($customer_info->height, $customer_info->current_weight);
        $show = $this->bmiService->getCategory($bmi);
        $recommendedAction = $this->bmiService->getRecommendedAction($bmi);

        if (($currentGoal === 'Increase' && $recommendedAction === 'Decrease') ||
            ($currentGoal === 'Decrease' && $recommendedAction === 'Increase')) {
            Goal::where('email', $email)->update(['weight' => $recommendedAction]);
        }

        return view('goaldone', [
            'goal' => $recommendedAction,
            'email' => $email,
            'age' => $age,
            'BMI' => round($bmi),
            'show' => $show,
            'do' => 'Nothing'
        ]);
    }
}
