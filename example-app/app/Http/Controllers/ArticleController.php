<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Routing\Controller as BaseController;

class ArticleController extends BaseController

{   
    public function index(){
        
    }
    public function show(Article $article){
    return view('articles.show', [
        'article' => $article
    ]);
}
}
