<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Password;


class ForgotPasswordController extends Controller
{
    public function getForgotPassword(){
        return view("forgotPassword");
    }

    public function resetPassword(Request $request){
        $request->validate([
            'email' => 'required|string|email',
        ]);

        $result = Password::sendResetLink(
            $request->only('email'),
        );

        if($result == Password::RESET_LINK_SENT){
            return back()->with('status', trans($result));
        }

        return back()->withInput($request->only('email'))
                     ->withErrors(['email' => trans($result)]); 
    }
}
