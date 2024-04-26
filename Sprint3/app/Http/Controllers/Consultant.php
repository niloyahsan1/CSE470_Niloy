<?php

namespace App\Http\Controllers;

use App\Models\UserAppo;
use Illuminate\Http\Request;

class Consultant extends Controller
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
    
        $user = UserAppo::create([
            'full_name' => $full_name,
            'email' => $email,
            'phn' => $phn,
            'msg' => $msg,
        ]);
    $userrr = UserAppo::where('msg', $msg)->first();
    // return $userrr;
    $c_no = $userrr->c_no;

        return view('consappo', ['email' => $email, 'msg' => $msg, 'c_no' => $c_no]);
    }
    
}
