<?php

namespace Database\Seeders;

use App\Models\Materi;
use App\Models\Pembelajaran;
use App\Models\Microlearning;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory as Faker;

class mainSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Microlearning::truncate();
        Pembelajaran::truncate();
        Materi::truncate();
        Schema::enableForeignKeyConstraints();

        $this->main();
    }

    public function main()
    {
        $mic = Microlearning::create([
            'judul' => 'Microlearning pertama.',
            'active' => true,
            'refs' => [
                'color' => '#0369a1'
            ]
        ]);

        $this->pemb($mic->id);

        $mic = Microlearning::create([
            'judul' => 'Microlearning kedua.',
            'refs' => [
                'color' => '#065f46'
            ]
        ]);

        $this->pemb($mic->id);
    }

    public function pemb($mid)
    {
        $faker = Faker::create('id_ID');

        for ($i=1; $i < rand(9, 15) ; $i++) {
            $pem = Pembelajaran::create([
                'microlearning_id' => $mid,
                'nomor' => $i,
                "judul" => $faker->words(3, true),
                'refs' => [
                    "image" => $faker->imageUrl(640, 360, 'animals', true)
                ]
            ]);

            $this->materi($pem->id);
        }

    }

    public function materi($pid)
    {
        $faker = Faker::create('id_ID');
        $ytid = ["-H5tKLatMF8","s54H94hile4","tmerNTqPosM","NGp9Epzkhz8","Zd-wlKv3LSQ","-Ib_3ZVEoBg","vbQC6G35dxc","sy_jJDQWEx8","MtuNVfTswvU","T-KmuUHhY6A","V5j-lV74D2M","PxvahsReRhY","rQR9uBHlC5s","qOpof8Bmwyk"];

        for ($i=1; $i < rand(5, 18) ; $i++) {
            Materi::create([
                'pembelajaran_id' => $pid,
                'nomor' => $i,
                'judul' => $faker->words(rand(2, 13), true),
                'refs' => [
                    [
                        'id' => 1,
                        'link' => $ytid[rand(0,8)],//$faker->url(),
                        'type' => 'youtube',
                        'intro' => $faker->paragraphs(2, true)
                    ]
                ]
            ]);
        }
    }
}
