<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Goal;
use App\Services\BmiService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DailyActivityController extends Controller
{
    protected BmiService $bmiService;

    public function __construct(BmiService $bmiService)
    {
        $this->bmiService = $bmiService;
    }

    public function dailyactivity(Request $request)
    {
        $user = auth()->user();
        $email = $user ? $user->email : $request->input('email');

        $customer_info = Profile::where('email', $email)->latest('id')->first();
        if (!$customer_info) {
            return redirect()->route('profile_show')->with('error', 'Please complete your profile first.');
        }

        $goalRecord = Goal::where('email', $email)->latest('id')->first();
        $goal = $goalRecord ? $goalRecord->weight : $request->input('weight');
        $age = $customer_info->age;

        $bmi = $this->bmiService->calculate($customer_info->height, $customer_info->current_weight);
        $show = $this->bmiService->getCategory($bmi);
        $tableName = $this->bmiService->getActivityTable($bmi);

        $activityTableData = DB::table($tableName)->get();

        return view('da', [
            'activityTableData' => $activityTableData,
            'show' => $show,
            'BMI' => round($bmi),
            'age' => $age,
            'email' => $email,
            'goal' => $goal
        ]);
    }
}
