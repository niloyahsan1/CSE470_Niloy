<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class ConsultantController extends Controller
{
    public function showconsultantform(Request $request)
    {
        $email = $request->input('email');
        $goal = $request->input('weight');
        $age = $request->input('age');
    
        return view('consultant', ['age' => $age, 'email' => $email, 'goal' => $goal]);
    }
    
    public function appo(Request $request)
    {
        $email = $request->input('email');
        $full_name = $request->input('full_name');
        $phn = $request->input('phn');
        $msg = $request->input('msg');
    
        $appointment = Appointment::create([
            'full_name' => $full_name,
            'email' => $email,
            'phn' => $phn,
            'msg' => $msg,
        ]);

        $c_no = $appointment->c_no ?? Appointment::where('msg', $msg)->value('c_no');

        return view('consultant_appointment_confirmation', ['email' => $email, 'msg' => $msg, 'c_no' => $c_no]);
    }
}
