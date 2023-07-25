<?php

namespace App\Http\Controllers;

use App\Models\Criteria;
use App\Models\User;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke()
    {
        // $users = User::get();
        
        // return view('Home', ['users'=>$users ]);

         return view('Home');
    }
}
