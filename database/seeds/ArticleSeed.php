<?php

use App\Article;
use Illuminate\Database\Seeder;

class ArticleSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Цикл вместо передачи значения в factory для random даты
        for ($i=0; $i < 20; $i++) {
            factory(Article::class)->create();
            sleep(1);
        }
    }
}
