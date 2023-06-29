<?php

namespace App\Http\Controllers;

use App\Mail\OrderShipped;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function sendEmail()
    {
        $recieverEmailAdress = "fabowared@gamil.com";
        Mail::to($recieverEmailAdress)->send(new OrderShipped());
         if (Mail::failures() != 0) {
             return "Email has been sent successfully!";
         }
            return "Oops! There was some error sending the email !";
    }


    
}
