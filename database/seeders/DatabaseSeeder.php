<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Config;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Config::truncate();
        Config::create([
            'identity' => 'landing',
            'body' => ['welcome' => '<p class="mb-6">Kemampuan untuk mengenali diri, mengontrol diri, mengatur diri sendiri dan juga kemampuan untuk mengelola diri sendiri dengan baik dalam hal manajemen waktu, manajemen kinerja dan produktivitas dipercaya akan memampukan seseorang untuk memahami kekuatan dan kelemahan pribadinya, sehingga niscaya mampu mencapai kompetensi diri yang sesuai dengan potensi dan bakatnya demi meraih kesuksesan di dunia kerja dan memiliki karir yang cemerlang.</p><p class="mb-6">Memanfaatkan kemajuan teknologi digital dalam memperkuat keterampilan interpersonal, keterampilan sosial dan keterampilan pengembangan diri saat ini sudah merupakan katalisator dalam pencapaian karir yang sukses di dunia kerja yang sangat fleksibel dan dinamis. Literasi dunia kerja, literasi pengembangan diri dan literasi karir sangat diperlukan untuk menjalani seluruh proses diatas demi meraih tujuan karir impian.</p><p class="mb-6">Pusat Pasar Kerja (Pasker.ID) mengembangkan konten dan media belajar terkait literasi dunia kerja, literasi pengembangan diri, dan literasi karir ke dalam <i>Microlearning</i>.</p><p class="mb-6">Setiap konten dibagi menjadi segmen-segmen kecil dan terfokus untuk memudahkan dan mempercepat pemahaman terkait substansi materi. Dengan pengembangan microlearning ini diharapkan para Pencari Kerja dapat memahami kompetensi abad 21 dan beradaptasi dengan perkembangan dunia kerja yang fleksibel dan dinamis. </p>']
        ]);

        $this->call([
            userSeeder::class,
            mainSeeder::class,
        ]);

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
