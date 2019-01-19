<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'nameproduct' => $faker->catchPhrase,
        'namesupplier' => $faker->company,
        'quantity'  => $faker->numberBetween($min = 1, $max = 9000),
        'keterangan' => $faker->realText($maxNbChars = 25, $indexSize = 2),
        'ukuran' => $faker->numerify('## x ##',$min=1),
        'created_at' => $faker->dateTimeBetween($startDate = '-2 months', $endDate = 'now', $timezone='UTC +7')
    ];
});
