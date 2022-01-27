<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function index(Request $request)
    {

        $emailId = $request->input('emailId');

        // return $emailId;

        Mail::to($emailId)->send(new \App\Mail\MyTestMail());

        // dd("");
        return "Email is Sent to ".$emailId;

        // $user = Auth::user();
        // // $roleNo = auth()->user()->is_admin;
        // // return 'sending...'.$roleNo;
        // return $user->is_admin.' ok. sendding...';
        // // return 'ok';
        // // if(Auth::user()->isAdmin == 1){
        // //     return 'Sending Email...';
        // // }else{
        // //     return 'none admin user';
        // // }

    }
}
