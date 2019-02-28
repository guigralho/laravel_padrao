<?php

use BeBack\Constants\UserGroupStatusConstant;
use BeBack\Constants\UserStatusConstant;
use BeBack\Constants\HotelStatusConstant;
use BeBack\Constants\PromotionStatusConstant;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(BeBack\Models\UserGroup::class, function (Faker $faker, array $options = []) {
    return [
        'name' => data_get($options, 'name', $faker->firstName),
        'description' => $faker->text,
        'status' => data_get($options, 'status',(rand(0,1) == 1) ? UserGroupStatusConstant::INACTIVE : UserGroupStatusConstant::ACTIVE),
    ];
});

$factory->define(BeBack\Models\User::class, function (Faker $faker, array $options = []) {
    return [
    	'user_group_id' => data_get($options, 'user_group_id',  function() {
            return factory(BeBack\Models\UserGroup::class)->create()->id;
        }),
        'name' => data_get($options, 'name', $faker->name),
        'email' => $faker->unique()->safeEmail,
        'status' => data_get($options, 'status',(rand(0,1) == 1) ? UserStatusConstant::INACTIVE : UserStatusConstant::ACTIVE),
        'password' => bcrypt(data_get($options, 'password', 'inter123')), // secret
        'remember_token' => str_random(10),
    ];
});

$factory->define(BeBack\Models\Hotel::class, function (Faker $faker, array $options = []) {
    return [
        'status' => data_get($options, 'status',(rand(0,1) == 1) ? HotelStatusConstant::INACTIVE : HotelStatusConstant::ACTIVE),
        'name' => data_get($options, 'name', $faker->name),
        'user_created_id' => data_get($options, 'user_created_id',  function() {
            return factory(BeBack\Models\User::class)->create()->id;
        }),
    ];
});

$factory->define(BeBack\Models\Promotion::class, function (Faker $faker, array $options = []) {
    return array(
        'status' => data_get($options, 'status',(rand(0,1) == 1) ? PromotionStatusConstant::INACTIVE : PromotionStatusConstant::ACTIVE),
        'hotel_id' => data_get($options, 'hotel_id',  function() {
            return factory(BeBack\Models\Hotel::class)->create()->id;
        }),
        'name' => data_get($options, 'name', $faker->name),
        'description' => data_get($options, 'description', $faker->text),
        'image' => '',//data_get($options, 'image', $faker->image('public/storage/promotion_images',400,300, null, false)),
        'price' => data_get($options, 'price', $faker->randomFloat(2, 0, 10)),
        'discount' => data_get($options, 'discount', $faker->randomFloat(2, 0, 10)),
        'user_created_id' => data_get($options, 'user_created_id',  function() {
            return factory(BeBack\Models\User::class)->create()->id;
        }),
    );
});