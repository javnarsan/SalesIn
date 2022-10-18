<?php

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
        // $this->call(UsersTableSeeder::class);
        factory(\SalesIn\Cicles::class, 100)->create();
        factory(\SalesIn\Articles::class, 100)->create();
        factory(\SalesIn\Users::class, 100)->create();
        factory(\SalesIn\Offers::class, 100)->create();
        factory(\SalesIn\Requirements::class, 100)->create();
        factory(\SalesIn\Applied::class, 100)->create();
    }
}
