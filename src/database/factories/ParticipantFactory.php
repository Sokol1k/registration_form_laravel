<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Participant;
use Faker\Generator as Faker;


$factory->define(Participant::class, function (Faker $faker) {
    return [
        'firstname' => $faker->firstname,
        'lastname' => $faker->lastname,
        'birthdate' => $faker->date($format = "y-m-d", $max = 'now'),
        'report_subject' => $faker->sentence($nbWords = 2, $variableNbWords = true),
        'country' => $faker->country,
        'phone' => $faker->phoneNumber,
        'email' => $faker->unique()->safeEmail,
        'company' => $faker->company,
        'position' => $faker->jobTitle,
        'about_me' => $faker->text($maxNbChars = 50), 
        'photo' => $faker->imageUrl($width = 100, $height = 100, 'cats'),
    ];
});
