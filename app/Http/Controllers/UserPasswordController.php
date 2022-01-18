<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;

class UserPasswordController extends Controller
{
    public function showUpdatePasswordPage () {
        return view('updatePassword')->with('toShow', 'UpdateForm');
    }

    public function updatePassword (Request $request) {

        $read_table_users = DB::table('users')->where('email', Auth::user()->email)
                                              ->get('password');
        $password = $read_table_users[0]->password;

        if (Hash::check($request->input('oldPassword'), $password)) {
            // echo "Right old Password </br>";
        }else {
            // echo "Wrong old Password </br>";
            return view('updatePassword')->with('toShow', 'WrongOldPassword');
        }

        if (Hash::check($request->input('newPassword'), bcrypt($request->input('confirmNewPassword')))) {
            // echo "Right new Password </br>";
        }else {
            // echo "Wrong new Password </br>";
            return view('updatePassword')->with('toShow', 'WrongConfirmPassword');
        }

        if (Hash::check($request->input('oldPassword'), bcrypt($request->input('newPassword')))) {
            // echo "Same Password </br>";
            return view('updatePassword')->with('toShow', 'SameNewPassword');
        }else {
            // echo "Different Password </br>";
        }
        
        DB::table('users')->where('email', Auth::user()->email)
                          ->update([
                              'password' => bcrypt($request->input('newPassword')),
                          ]);
        return view('updatePassword')->with('toShow', 'SuccessfullyUpdated');
    }

    public function test () {
        $read_password = DB::table('users')->where('email', 'epetrinadin@mail.com')
                          ->get('initial_password');
        $password = $read_password[0]->initial_password;        

        // $word = "good";
        // $test = Crypt::encryptString($word);
        // echo $test . "</br>";
        // $test = Crypt::decryptString($test);
        // echo $test . "</br>";
        echo Crypt::decryptString($password);
    }
}
