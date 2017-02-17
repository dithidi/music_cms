<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class ArticleController extends Controller
{
    /**
     * Fetch all articles for admin section
     * 
     * @return Article
     */
    public function adminGetArticles() {
        return Article::all();
    }

    /**
     * Fetch a particular article for admin section
     * 
     * @param integer $id
     * @return Article
     */
    public function adminGetArticle($id) {
        return Article::find($id);
    }

    public function adminUpdateArticle($id, Request $request) {
        $article = Article::find($id);

        $article->title = $request->title;
        $article->author = $request->author;
        $article->body = $request->body;
        $article->published = $request->published;

        $article->save();

        return $article;
    }

    public function adminCreateArticle(Request $request) {
        $article = new Article;

        $article->title = $request->title;
        $article->author = $request->author;
        $article->body = $request->body;
        $article->published = $request->published;

        $article->save();

        return $article;
    }
}
