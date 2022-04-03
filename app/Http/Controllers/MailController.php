<?php

namespace App\Http\Controllers;

use App\Mail\SignupEmail;
use App\Mail\VerifyEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public static function sendSignupEmail($name, $email, $verification_code){
        $data = [
            'name' => $name,
            'verification_code' => $verification_code
        ];
        Mail::to($email)->send(new SignupEmail($data));
    }
    public static function sendEmail($name, $email, $verification_code){
        $data = [
            'name' => $name,
            'verification_code' => $verification_code,
            'email' => $email,
        ];
        Mail::to($email)->send(new VerifyEmail($data));
    }
}
