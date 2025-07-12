<?php

namespace App\Services;

use App\Models\Article;
use App\Models\Visitor;
use Carbon\Carbon;

class StatsService
{
    public function getVisitorStats($period = 'week')
    {
        $endDate = Carbon::now();

        switch ($period) {
            case 'day':
                $startDate = Carbon::now()->subDay();
                break;
            case 'month':
                $startDate = Carbon::now()->subMonth();
                break;
            case 'year':
                $startDate = Carbon::now()->subYear();
                break;
            default: // week
                $startDate = Carbon::now()->subWeek();
                break;
        }

        $visitors = Visitor::whereBetween('created_at', [$startDate, $endDate])
            ->get()
            ->groupBy(function ($date) {
                return Carbon::parse($date->created_at)->format('Y-m-d');
            });

        $stats = [];
        $date = clone $startDate;

        while ($date <= $endDate) {
            $formattedDate = $date->format('Y-m-d');
            $stats[$formattedDate] = $visitors->has($formattedDate) ? $visitors[$formattedDate]->count() : 0;
            $date->addDay();
        }

        return $stats;
    }

    public function getPopularArticles($limit = 5)
    {
        return Article::orderBy('views', 'desc')
            ->take($limit)
            ->get();
    }

    public function getArticlesByCategory()
    {
        return Article::with('category')
            ->selectRaw('category_id, count(*) as count')
            ->groupBy('category_id')
            ->get()
            ->mapWithKeys(function ($item) {
                return [$item->category->name => $item->count];
            });
    }
}