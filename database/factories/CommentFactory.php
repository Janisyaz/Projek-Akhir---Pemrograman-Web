<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    protected $model = Comment::class;

    // CommentFactory
    public function definition()
    {
        $names = ['Budi Santoso', 'Ani Wijaya', 'Dewi Lestari', 'Agus Setiawan', 'Rina Permata'];
        $emails = ['budi@example.com', 'ani@example.com', 'dewi@example.com', 'agus@example.com', 'rina@example.com'];
        $comments = [
            "Artikel yang sangat informatif, terima kasih!",
            "Saya setuju dengan pandangan penulis dalam artikel ini.",
            "Ada beberapa poin yang menurut saya perlu diklarifikasi lebih lanjut.",
            "Informasi yang disajikan sangat relevan dengan kondisi saat ini.",
            "Tulisan yang bagus, saya tunggu artikel berikutnya."
        ];

        return [
            'name' => $this->faker->randomElement($names),
            'email' => $this->faker->randomElement($emails),
            'content' => $this->faker->randomElement($comments),
            'article_id' => Article::inRandomOrder()->first()->id,
            'approved' => $this->faker->boolean(80),
        ];
    }
}