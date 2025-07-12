<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Comment;

class PublicController extends Controller
{
    public function home()
    {
        $categories = Category::withCount('articles')->get();
        $featuredArticles = Article::published()
            ->with(['category', 'author'])
            ->latest('published_at')
            ->take(3)
            ->get();

        $latestArticles = Article::published()
            ->with(['category', 'author'])
            ->latest('published_at')
            ->skip(3)
            ->take(4)
            ->get();

        return view('home', compact('categories', 'featuredArticles', 'latestArticles'));
    }

    public function indexArticles()
    {
        $articles = Article::published()
            ->with(['category', 'author'])
            ->latest('published_at')
            ->filter(request(['search']))
            ->paginate(9);

        return view('articles.public-index', compact('articles'));
    }


    public function showArticle(Article $article)
    {
        if (!$article->is_published) {
            abort(404);
        }

        $article->incrementViews();

        $relatedArticles = Article::published()
            ->where('category_id', $article->category_id)
            ->where('id', '!=', $article->id)
            ->take(3)
            ->get();

        $approvedComments = $article->comments()
            ->where('approved', true)
            ->latest()
            ->get();

        return view('articles.public-show', compact('article', 'relatedArticles', 'approvedComments'));
    }

    public function showCategory(Category $category)
    {
        $articles = Article::published()
            ->where('category_id', $category->id)
            ->with(['author'])
            ->latest('published_at')
            ->paginate(9);

        return view('categories.public-show', compact('category', 'articles'));
    }
}