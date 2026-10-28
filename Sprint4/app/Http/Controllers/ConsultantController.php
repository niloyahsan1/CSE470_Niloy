<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookAppointmentRequest;
use App\Models\Appointment;
use Illuminate\Http\Request;

class ConsultantController extends Controller
{
    public function dashboard()
    {
        $appointments = Appointment::all();
        return view('consultantpage', ['appointments' => $appointments]);
    }

    public function showconsultantform(Request $request)
    {
        $email = $request->input('email');
        $goal = $request->input('weight');
        $age = $request->input('age');
    
        return view('consultant', ['age' => $age, 'email' => $email, 'goal' => $goal]);
    }
    
    public function appo(BookAppointmentRequest $request)
    {
        $validated = $request->validated();

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
