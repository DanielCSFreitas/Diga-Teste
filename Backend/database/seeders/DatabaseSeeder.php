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
        // Populate the Movie table
        \App\Models\Movie::factory()->count(8)->create();

        // Populate the Movie table
        \App\Models\Tag::factory()->count(8)->create();

        // Get all tag
        $tag = \App\Models\Tag::all();

        // Populate the MovieTag table
        \App\Models\Movie::all()->each(function ($movie) use ($tag) { 
        $movie->tag()->attach(
            $tag->random(rand(1, 3))->pluck('id')->toArray()
        ); 
    });
}
}
