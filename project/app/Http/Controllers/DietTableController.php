<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DietTableController extends Controller
{
    public function showTable(Request $request)
    {
        $goal = $request->only('weight');
        $age = $request->only('age');
        $email = $request->only('email');

        // getting the table
        if ($goal['weight'] == 'Decrease' && $age['age'] == '10 - 16') {
            $dietTableData = DB::table('dec_diet_table1')->get();
        } elseif ($goal['weight'] == 'Decrease' && $age['age'] == '17 - 20') {
            $dietTableData = DB::table('dec_diet_table2')->get();
        } elseif ($goal['weight'] == 'Decrease' && $age['age'] == '21 - 26') {
            $dietTableData = DB::table('dec_diet_table3')->get();
        } elseif ($goal['weight'] == 'Decrease' && $age['age'] == '27 - 35') {
            $dietTableData = DB::table('dec_diet_table4')->get();
        } elseif ($goal['weight'] == 'Decrease' && $age['age'] == '36 - 45') {
            $dietTableData = DB::table('dec_diet_table5')->get();
        } elseif ($goal['weight'] == 'Decrease' && $age['age'] == '46 - 55') {
            $dietTableData = DB::table('dec_diet_table7')->get();
        } elseif ($goal['weight'] == 'Decrease' && $age['age'] == '56 - 70') {
            $dietTableData = DB::table('dec_diet_table8')->get();
        } elseif ($goal['weight'] == 'Increase' && $age['age'] == '10 - 16') {
            $dietTableData = DB::table('inc_diet_table1')->get();
        } elseif ($goal['weight'] == 'Increase' && $age['age'] == '17 - 20') {
            $dietTableData = DB::table('inc_diet_table2')->get();
        } elseif ($goal['weight'] == 'Increase' && $age['age'] == '21 - 26') {
            $dietTableData = DB::table('inc_diet_table3')->get();
        } elseif ($goal['weight'] == 'Increase' && $age['age'] == '27 - 35') {
            $dietTableData = DB::table('inc_diet_table4')->get();
        } elseif ($goal['weight'] == 'Increase' && $age['age'] == '36 - 45') {
            $dietTableData = DB::table('inc_diet_table5')->get();
        } elseif ($goal['weight'] == 'Increase' && $age['age'] == '46 - 55') {
            $dietTableData = DB::table('inc_diet_table7')->get();
        } elseif ($goal['weight'] == 'Increase' && $age['age'] == '56 - 70') {
            $dietTableData = DB::table('inc_diet_table8')->get();
        }
        // else {
        //     $dietTableData = "kk";
        // }

        return view('ddc', ['dietTableData' => $dietTableData, 'age'=>$age['age'], 'email'=>$email['email'], 'goal'=>$goal['weight']]);
    }
}
