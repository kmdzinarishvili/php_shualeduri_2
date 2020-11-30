<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\Question;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function login(){
        return view('login');

    }
    public function postLogin(Request $request){

        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        if (Auth::attempt($credentials)){
            $user = Auth::user();
            $questions = Question::all();
            return redirect()->route('quiz', compact($user, $questions));
        }else{
            abort(403);
        }
    }

}
