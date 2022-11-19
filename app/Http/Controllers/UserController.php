<?php

namespace App\Http\Controllers;

use App\CustomClasses\User\User;

class UserController extends Controller
{
    public function getUsers(): \Illuminate\Http\JsonResponse
    {
        $user = User::fetchUsers();
        return response()->json($user);
    }
}
