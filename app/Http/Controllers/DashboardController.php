<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Visitor;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Basic Stats
        $stats = [
            'articles' => Article::count(),
            'categories' => Category::count(),
            'comments' => Comment::count(),
            'visitors' => Visitor::count(),
        ];

        // Visitor stats (7 days)
        $visitorStats = $this->getVisitorStats('week');

        // Popular articles (most viewed)
        $popularArticles = Article::orderBy('views', 'desc')
            ->take(5)
            ->get();

        // Articles by category (for distribution chart)
        $articlesByCategory = Category::withCount('articles')
            ->orderBy('articles_count', 'desc')
            ->get();

        // Recent articles
        $recentArticles = Article::latest()
            ->take(5)
            ->get();

        // Pending comments
        $pendingComments = Comment::where('approved', false)
            ->latest()
            ->take(5)
            ->get();

        // Weekly stats (for alternative 3)
        $weeklyStats = [
            'new_articles' => Article::where('created_at', '>=', Carbon::now()->startOfWeek())->count(),
            'new_comments' => Comment::where('created_at', '>=', Carbon::now()->startOfWeek())->count(),
            'new_visitors' => Visitor::where('created_at', '>=', Carbon::now()->startOfWeek())->count(),
            'new_categories' => Category::where('created_at', '>=', Carbon::now()->startOfWeek())->count(),
        ];

        return view('dashboard', compact(
            'stats',
            'visitorStats',
            'popularArticles',
            'articlesByCategory',
            'recentArticles',
            'pendingComments',
            'weeklyStats'
        ));
    }

    protected function getVisitorStats($period = 'week')
    {
        $query = Visitor::query();

        if ($period === 'week') {
            $query->where('created_at', '>=', now()->subDays(7))
                ->select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as count'))
                ->groupBy('date')
                ->orderBy('date');
        }

        $results = $query->get();

        $stats = [];
        foreach ($results as $result) {
            $stats[$result->date] = $result->count;
        }

        return $stats;
    }
}