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
            'body' => ['welcome' => '<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Odit voluptates neque impedit quae beatae fugit nemo perspiciatis magni veritatis nostrum, recusandae esse, quasi nobis cupiditate itaque non sed culpa eligendi veniam expedita! Amet similique nam laudantium beatae voluptatibus animi odit. Incidunt et voluptatum delectus tempore doloribus magnam dolorum, saepe qui architecto accusamus vel. At ratione dignissimos dicta quisquam nam, aliquid numquam repellendus natus alias autem voluptatum nihil fugiat cum velit quo qui obcaecati, sint debitis. Inventore, delectus tenetur? Perferendis consequatur sapiente molestias suscipit? Sapiente, eveniet fuga. Architecto voluptas perferendis cupiditate beatae sapiente error sequi, tenetur harum repellat aliquid quidem sed fugiat libero adipisci dicta modi molestiae natus dolor, obcaecati excepturi vero. Numquam ipsam architecto, ducimus cum modi enim recusandae molestiae, ipsum obcaecati quibusdam beatae repellat magnam aspernatur voluptate et dolore, maiores atque deleniti laudantium? Adipisci natus esse vitae neque odit ex vel quidem tempora vero aliquid, quam, sed omnis earum placeat obcaecati velit perferendis aperiam quas repellat possimus numquam illo? Optio vero facere ab doloribus quibusdam eaque aperiam, obcaecati odit. Excepturi possimus voluptates animi provident explicabo, nemo similique minima qui saepe assumenda, aut fugiat dolorem soluta perferendis, delectus incidunt aspernatur! Blanditiis quas facilis animi aliquam modi dolor minima porro consequuntur doloribus dolores ducimus, neque eum illo? Autem libero dolorem placeat voluptas culpa qui excepturi accusamus blanditiis, quis, soluta molestiae voluptatibus dicta, labore quo veniam voluptates asperiores inventore tempora doloribus voluptatum. Vero fugiat corporis quo alias iusto repellendus voluptas fuga modi non! Quia aspernatur ut libero quae reprehenderit ullam minus. Debitis!</p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas dicta esse sunt necessitatibus ea architecto minus impedit? Dignissimos architecto, officia nisi accusantium blanditiis itaque qui debitis harum autem ab magnam quasi voluptatibus. Id, minus, architecto quos voluptas vel perspiciatis reprehenderit provident dolor quae, dolorum consequuntur commodi ipsam? Perspiciatis quo dolorum, impedit pariatur, perferendis fugit totam aperiam culpa rem voluptas labore nesciunt iste numquam quod obcaecati? Enim tempore, minima nulla omnis numquam facere? Aut consequatur minus est, delectus perspiciatis voluptatem voluptatibus.</p>']
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
