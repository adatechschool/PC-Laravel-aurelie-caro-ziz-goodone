<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        
    }
    public function show(User $user){
        return view('users.show', [
            'user' => $user
        ]);
    }
    
}

// s'il y'a une erreur c'est ici regardez showUsers.blade.php