<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function login(Request $request) 
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) 
        {                    
            // $user = Auth::user(); $token = $user->createToken('token')->plainTextToken;
            $token = $request->user()->createToken('token')->plainTextToken;       

            return response()
               ->json(['status' => true, 'token' => $token, 'token_type' => 'Bearer'], Response::HTTP_OK)   
               ->withCookie(cookie('api_token',  $token, 60 * 24 * 2));            
        } 

        return response()->json(['status' => false, 'message'=> 'Credenciales inválidas'], Response::HTTP_OK);             
    }


    public function logout() 
    {
        $cookie = Cookie::forget('cookie_token');
        return response()->json(['status' => true], Response::HTTP_OK)->withCookie($cookie);          
    }

}
