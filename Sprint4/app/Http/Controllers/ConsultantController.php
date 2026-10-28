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
        $validated = $request->validate([
            'full_name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:100'],
            'phn' => ['required', 'string', 'max:20'],
            'msg' => ['required', 'string', 'max:1000'],
        ]);

        $appointment = Appointment::create([
            'full_name' => $validated['full_name'],
            'email' => $validated['email'],
            'phn' => $validated['phn'],
            'msg' => $validated['msg'],
        ]);

        return view('consultant_appointment_confirmation', [
            'email' => $appointment->email,
            'msg' => $appointment->msg,
            'c_no' => $appointment->c_no
        ]);
    }
}
