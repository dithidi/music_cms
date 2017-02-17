<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class SiteController extends Controller
{
    public function index() {
        $articles = Article::all();
        return view('welcome', [
            'articles' => $articles    
        ]);
    }
}
