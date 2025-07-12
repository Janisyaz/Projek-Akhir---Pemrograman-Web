<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    protected $model = Article::class;

    public function definition()
    {
        $titles = [
            "Pemerintah Umumkan Rencana Pembangunan Ibu Kota Baru",
            "Bank Indonesia Pertahankan Suku Bunga Acuan",
            "Pemain Muda Indonesia Bersinar di Liga Champions Eropa",
            "Aplikasi Dompet Digital Lokal Capai 10 Juta Pengguna",
            "Serial Web Indonesia Mendapat Pengakuan Internasional",
            "Hujan Deras Picu Banjir di Beberapa Wilayah Jakarta",
            "Konsumsi Kopi Nasional Meningkat Signifikan",
            "Ekspor Komoditas Pertanian Tumbuh 15% di Kuartal Ini",
            "Festival Budaya Nusantara Digelar Secara Hybrid",
            "Peneliti Temukan Spesies Baru di Hutan Kalimantan"
        ];

        $contents = [
            "Pemerintah hari ini mengumumkan rencana detail pembangunan ibu kota baru di Kalimantan Timur. Proyek ini akan dimulai tahun depan dengan anggaran awal Rp50 triliun.",
            "Bank Indonesia memutuskan untuk mempertahankan suku bunga acuan di level 4,25% dalam rapat bulan ini. Keputusan ini diambil untuk menjaga stabilitas ekonomi.",
            "Seorang pemain muda asal Indonesia berhasil mencetak gol penting untuk klubnya dalam pertandingan Liga Champions. Prestasi ini membanggakan masyarakat tanah air.",
            "Aplikasi dompet digital buatan dalam negeri berhasil mencapai 10 juta pengguna aktif. Pencapaian ini menunjukkan tingginya adopsi teknologi finansial di Indonesia.",
            "Serial web produksi Indonesia berhasil masuk nominasi di festival film internasional. Karya ini dinilai memiliki cerita yang universal namun tetap kental dengan budaya lokal.",
            "Intensitas hujan yang tinggi selama tiga hari terakhir menyebabkan banjir di beberapa wilayah Jakarta. Pemprov DKI telah membuka posko darurat untuk menangani dampaknya.",
            "Data terbaru menunjukkan konsumsi kopi di Indonesia meningkat 20% dibanding tahun lalu. Tren ini sejalan dengan berkembangnya kedai kopi lokal di berbagai kota.",
            "Kinerja ekspor komoditas pertanian menunjukkan pertumbuhan positif di kuartal ini. Kenaikan terbesar terjadi pada ekspor kelapa sawit dan produk turunannya.",
            "Festival budaya nusantara tahun ini digelar secara hybrid, menggabungkan pertunjukan langsung dan virtual. Acara ini menampilkan kekayaan budaya dari 34 provinsi.",
            "Tim peneliti dari universitas ternama menemukan spesies baru flora dan fauna di hutan Kalimantan. Temuan ini penting untuk konservasi keanekaragaman hayati."
        ];

        return [
            'title' => $this->faker->randomElement($titles),
            'slug' => $this->faker->unique()->slug,
            'content' => $this->faker->randomElement($contents),
            'category_id' => Category::inRandomOrder()->first()->id,
            'user_id' => User::first()->id,
            'published' => true,
            'published_at' => $this->faker->dateTimeThisYear,
            'views' => $this->faker->numberBetween(0, 1000),
        ];
    }
}