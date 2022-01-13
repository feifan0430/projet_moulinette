<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MailController extends Controller
{
    public function sendEmail() {
        $decrypted = bcrypt(Auth::user()->password);
        // 纯文本信息邮件测试
        Mail::raw($decrypted, function ($message) {
            $to = 'jiaqi.gao@etu.imt-nord-europe.fr';
            $message ->to($to)->subject('Password');
        });
        if (count(Mail::failures()) < 1) {
            echo '发送邮件成功，请查收！';
        } else {
            echo '发送邮件失败，请重试！';
        }
    }
}
