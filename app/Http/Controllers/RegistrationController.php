<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{
    //login constructor ( memperkenalkan bahwa kelas ini oleh orang yg belum login )
    // public function __construct(){
    //     $this->middleware('guest');
    // }

    public function create(){
        return view('auth.register');
    }

    public function store(RegistrationRequest $request){

        //jika kolom yang diinput beda dengan kolom yang ada didatabase bisa lakukan seperti ini
        //contoh kolom input = username  sedangkan tabel database adalah user_name
        //maka bisa anda tuliskan seperti ini 'username'=>['required', 'unique:users, user_name', 'alpha_num', 'min:3', 'max:25']

        //versi normal validasi tanpa Http/Requests
        // $request->validate([
        //     'email'=>['required','email', 'unique:users'],
        //     'name'=>['required', 'string', 'min:3'],
        //     'username'=>['required', 'unique:users', 'alpha_num', 'min:3', 'max:25'],
        //     'password'=>['required', 'min:8'],
        // ]);

        //versi best practice validasi dengan Http/Requests

       // $attributes = $request->all();


        //versi normal create models
        // $user = User::where('email', $request->email)
        //         ->orwhere('username', $request->username)
        //         ->first();
        // if($user){
        //     dd('user sudah ada');
        // }

        //versi next level create models
        // User::create([
        //     'email'=>$request->email,
        //     'name'=>$request->name,
        //     'username'=>$request->username,
        //     'password'=>Hash::make( $request->password),
        // ]);

        //kita buat $attributes['password'] hanya karena Hash tidak aktif jika kita tidak mendeklarasikanya/membuatnya disini 
      ///  $attributes['password']= Hash::make($request->password);
        
        //versi best practice create models
        // User::create($attributes);
        
        //versi Advance practice create models
        User::create($request->all());

        //session
        // session()->flash('success', 'Thank you, you are now registered.');

        // return redirect('/');
        
        //bisa diper-simpel dengan kode dibawah ini

        return redirect('/')->with('success', 'Thank you, you are now registered.');
    }
}
