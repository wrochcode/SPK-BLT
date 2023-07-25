<?php

namespace Database\Factories;

use App\Models\Post;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(){
       // $factory->define( Post::class, function( Faker $faker ){}
        return[
                'user_id' => 2,
                'title' =>fake()->sentence(),
                'body' => fake()->sentence(), 
        ];
    }
   
}
