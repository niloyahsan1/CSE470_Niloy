<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DietTableController extends Controller
{
    private const AGE_TABLE_MAP = [
        '10 - 16' => '1',
        '17 - 20' => '2',
        '21 - 26' => '3',
        '27 - 35' => '4',
        '36 - 45' => '5',
        '46 - 55' => '7',
        '56 - 70' => '8',
    ];

    public function showTable(Request $request)
    {
        $user = auth()->user();
        $email = $user ? $user->email : $request->input('email');

        $profile = ($user && $user->profile) ? $user->profile : \App\Models\Profile::where('email', $email)->latest('id')->first();
        $goalRecord = ($user && $user->goal) ? $user->goal : \App\Models\Goal::where('email', $email)->latest('id')->first();

        $age = $profile ? $profile->age : $request->input('age');
        $weightGoal = $goalRecord ? $goalRecord->weight : $request->input('weight');

        $prefix = ($weightGoal === 'Increase') ? 'inc_diet_table' : 'dec_diet_table';
        $suffix = self::AGE_TABLE_MAP[$age] ?? null;

        $tableName = $suffix ? "{$prefix}{$suffix}" : null;
        $dietTableData = $tableName ? DB::table($tableName)->get() : collect();

        return view('ddc', [
            'dietTableData' => $dietTableData,
            'age' => $age,
            'email' => $email,
            'goal' => $weightGoal
        ]);
    }
}
