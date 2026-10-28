<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookAppointmentRequest;
use App\Models\Appointment;
use Illuminate\Http\Request;

class ConsultantController extends Controller
{
    /**
     * Consultant dashboard: list all customer messages.
     */
    public function dashboard()
    {
        $appointments = Appointment::orderByDesc('c_no')->get();
        return view('consultantpage', ['appointments' => $appointments]);
    }

    /**
     * Show the appointment booking form to customers.
     */
    public function showconsultantform(Request $request)
    {
        $user = auth()->user();
        $email = $user ? $user->email : $request->input('email');

        return view('consultant', ['email' => $email]);
    }

    /**
     * Customer submits a message/appointment request.
     */
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
            'appointment' => $appointment,
        ]);
    }

    /**
     * Consultant saves a reply to a single appointment message.
     */
    public function saveReply(Request $request, int $c_no)
    {
        $validated = $request->validate([
            'consultant_reply' => ['required', 'string', 'max:2000'],
        ]);

        $appointment = Appointment::where('c_no', $c_no)->firstOrFail();
        $appointment->update(['consultant_reply' => $validated['consultant_reply']]);

        return redirect()->route('consultant.dashboard')->with('success', 'Reply saved successfully.');
    }

    /**
     * Customer views their own messages and consultant replies.
     */
    public function myMessages()
    {
        $email = auth()->user()->email;
        $messages = Appointment::where('email', $email)->orderByDesc('c_no')->get();

        return view('my_messages', ['messages' => $messages]);
    }
}
