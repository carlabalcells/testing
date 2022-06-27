<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class TestController extends Controller
{
    function test(){
        
        $user = User::find(1);
        //var_dump($user);

        return view('welcome', ['user' => $user ]);
    }
}
