<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            TestSeeder::class,
            UserSeeder::class,
            AreaSeeder::class, //親テーブルから先に書く
            ShopSeeder::class,
            RouteSeeder::class,
            RouteShopSeeder::class,
        ]);

        // 100件
        \App\Models\ContactForm::factory(100)->create();

    }
}
