<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        return view('users.index', [
            //User didapat dari App\Models\User
            'users'=> User::get(),
            // 'posts'=> Post::get(),
        ]);
    }

    public function show(User $user){
        // return view('users.show', ['user'=> $user,]);
        return view('users.show', compact('user'));
    }

    // public function post( User $user ){
    //     // return view('users.index', $user);
    //     // return view('users.post', compact('user'));
    //     // $posts = Post::where('user_id', $user->id)->get(); 
    //     $posts = $user->posts;
    //     return view('users.post', [
    //         'user'=>$user,
    //         'posts'=>$posts,
    //     ]);
    // }
}
