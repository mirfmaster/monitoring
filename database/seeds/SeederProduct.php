<?php

use Illuminate\Database\Seeder;

class SeederProduct extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Product::class, 25)->create();
    }


}
