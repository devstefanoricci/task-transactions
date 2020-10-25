<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Transaction;
use App\Customer;
use Faker\Generator as Faker;

$factory->define(Transaction::class, function (Faker $faker) {
    return [
        'description' => $faker->sentence,
        'currency' => $faker->randomElement($array = array ('eur','dollar','pound')) ,
        'price' => $faker->randomDigitNotNull(),
        'customer_id' => Arr::random(Customer::all()->pluck('id')->toArray()) ?? factory(Customer::class)->create(),
    ];
});
