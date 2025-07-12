<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\Visitor;
use Illuminate\Database\Eloquent\Factories\Factory;

class VisitorFactory extends Factory
{
    protected $model = Visitor::class;

    public function definition()
    {
        return [
            'ip_address' => $this->faker->ipv4,
            'user_agent' => $this->faker->userAgent,
            'article_id' => $this->faker->boolean(70) ? Article::inRandomOrder()->first()->id : null,
        ];
    }
}