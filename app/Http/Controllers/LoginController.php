<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{

    //login constructor ( memperkenalkan bahwa kelas ini oleh orang yg belum login )
    // public function __construct(){
    //     $this->middleware('guest');
    // }

    public function create(){
        return view('auth.login');
    }

    public function store (Request $request){
        

       $attributes = $request -> validate([
                    'email'=>['required', 'email'],
                    'password'=>['required'],
                   ]);

        //check login

        // $user = User::whereEmail($request->email)->first();
        // if($user){
        //     if(Hash::check($request->password, $user->password)){
        //         // dd($user); 
        //         Auth::login($user);

        //         return redirect('/')->with('success', 'You are now logeed in');
        //     }
        // }

        //check login next level

        // if(Auth::attempt(['email'=>$request->email,'password'=>$request->password,])){
        //     return redirect('/')->with('success', 'You are now logeed in');
        // }

        //check best practice
        if(Auth::attempt($attributes)){
            return redirect(RouteServiceProvider::HOME)->with('success', 'You are now logeed in');
        }


        throw ValidationException::withMessages([
            'email'=>'Your email is wrong'
        ]);
    }
}
