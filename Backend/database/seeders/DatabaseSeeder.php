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
        \App\Models\Movies::factory()->count(8)->create();

        // Populate the Movie table
        \App\Models\Tags::factory()->count(8)->create();

        // Get all tags
        $tags = \App\Models\Tags::all();

        // Populate the MovieTag table
        \App\Models\Movies::all()->each(function ($movies) use ($tags) { 
        $movies->tags()->attach(
            $tags->random(rand(1, 3))->pluck('id')->toArray()
        ); 
    });
}
}
