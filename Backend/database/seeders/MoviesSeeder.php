<?php

namespace Database\Seeders;
use App\Models\Movies;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MoviesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Movies::factory()
            ->count(10)
            ->hasTags(3)
            ->create();
    }
}
