<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class PassportAuthController extends Controller
{
    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'address' =>'required',
            'phone_numbre'=>'required',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'address'=>$request->address,
            'phone_numbre'=>$request->phone_numbre,
        ]);

        $token = $user->createToken('abderrazzakkhouy')->accessToken;
        return response()->json(['token' => $token], 201);
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $data = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($data)) {
            $token = auth()->user()->createToken('abderrazzakkhouy')->accessToken; 
            return response()->json(['token' => $token], 200);
        } else {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }

    public function userInfo()
    {
        $user = auth()->user();
        return response()->json(['user' => $user], 200);
    }
}
