<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MailController extends Controller
{
    public function showMailPage() {
        return view('mail')->with('toShow', 'sendMailPage');
    }

    public function sendEmail() {
        $num_etudiant = DB::table('users')->where('permission', 'etudiant')->count();
        $read_list_etudiant = DB::table('users')->where('permission', 'etudiant')->get();
        for ($i = 0; $i < $num_etudiant; $i++) {
            $email = $read_list_etudiant[$i]->email;
            $initial_password = Crypt::decryptString($read_list_etudiant[$i]->initial_password);
            $content = 'Bonjour, votre mot de passe initial est ' . $initial_password . " .";
            Mail::raw($content, function ($message) use ($email) { 
                $to = $email;
                $message->to($to)->subject('Password');
            });
        }
        if (count(Mail::failures()) < 1) {
            return view('mail')->with('toShow', 'success');
        } else {
            return view('mail')->with('toShow', 'fail');
        }
    }
}
