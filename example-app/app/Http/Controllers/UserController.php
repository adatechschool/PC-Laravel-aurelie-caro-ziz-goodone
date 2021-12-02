<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Article;
use Doctrine\Inflector\Rules\Word;

class UserController extends Controller
{
    public function index(){
        $articles = Article::all();
        
        return view('users.show', ['articles'=>$articles]);

    }

    public function show(User $user){
        $articles = Article::all();
        return view('users.show', [
            'user' => $user,
            'articles' => $articles
        ]);
    }

    public function view_article($id){
        $user = User::find($id);
        $articles = $user->articles()->get();
    
        return Article::make("users.show")->with(array("user" => $user, "articles" => $articles));
    }
    
}

// s'il y'a une erreur c'est ici regardez showUsers.blade.php