<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Response;

class UserController extends Controller
{
    public function getUser($id){
        $user=User::find($id);
        return response()->json([
            'name'=>$user->name,
            'address'=>$user->address,
            'phone'=>$user->phone_numbre  
        ]);
    }
}
