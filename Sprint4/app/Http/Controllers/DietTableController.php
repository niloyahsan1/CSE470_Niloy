<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DietTableController extends Controller
{
    public function showTable(Request $request)
    {
        $user = auth()->user();
        $email = $user ? $user->email : $request->input('email');

        $profile = \App\Models\Profile::where('email', $email)->latest('id')->first();
        $goalRecord = \App\Models\Goal::where('email', $email)->latest('id')->first();

        $age = $profile ? $profile->age : $request->input('age');
        $weightGoal = $goalRecord ? $goalRecord->weight : $request->input('weight');

        // fallback if not found
        $dietTableData = collect();

        // getting the table
        if ($weightGoal == 'Decrease' && $age == '10 - 16') {
            $dietTableData = DB::table('dec_diet_table1')->get();
        } elseif ($weightGoal == 'Decrease' && $age == '17 - 20') {
            $dietTableData = DB::table('dec_diet_table2')->get();
        } elseif ($weightGoal == 'Decrease' && $age == '21 - 26') {
            $dietTableData = DB::table('dec_diet_table3')->get();
        } elseif ($weightGoal == 'Decrease' && $age == '27 - 35') {
            $dietTableData = DB::table('dec_diet_table4')->get();
        } elseif ($weightGoal == 'Decrease' && $age == '36 - 45') {
            $dietTableData = DB::table('dec_diet_table5')->get();
        } elseif ($weightGoal == 'Decrease' && $age == '46 - 55') {
            $dietTableData = DB::table('dec_diet_table7')->get();
        } elseif ($weightGoal == 'Decrease' && $age == '56 - 70') {
            $dietTableData = DB::table('dec_diet_table8')->get();
        } elseif ($weightGoal == 'Increase' && $age == '10 - 16') {
            $dietTableData = DB::table('inc_diet_table1')->get();
        } elseif ($weightGoal == 'Increase' && $age == '17 - 20') {
            $dietTableData = DB::table('inc_diet_table2')->get();
        } elseif ($weightGoal == 'Increase' && $age == '21 - 26') {
            $dietTableData = DB::table('inc_diet_table3')->get();
        } elseif ($weightGoal == 'Increase' && $age == '27 - 35') {
            $dietTableData = DB::table('inc_diet_table4')->get();
        } elseif ($weightGoal == 'Increase' && $age == '36 - 45') {
            $dietTableData = DB::table('inc_diet_table5')->get();
        } elseif ($weightGoal == 'Increase' && $age == '46 - 55') {
            $dietTableData = DB::table('inc_diet_table7')->get();
        } elseif ($weightGoal == 'Increase' && $age == '56 - 70') {
            $dietTableData = DB::table('inc_diet_table8')->get();
        }

        return view('ddc', [
            'dietTableData' => $dietTableData,
            'age' => $age,
            'email' => $email,
            'goal' => $weightGoal
        ]);
    }
}
