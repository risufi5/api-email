<?php

namespace App\Http\Controllers\Api;

use App\CustomClasses\User\User;
use App\Http\Controllers\Controller;
use App\Mail\UserMail;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function sendEmail()
    {
        $users = User::fetchUsers();
        $mail = new UserMail($users);
        Mail::to('renis.isufi5@gmail.com')
            ->send($mail);
    }
}
