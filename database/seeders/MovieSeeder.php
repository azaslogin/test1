<?php

namespace Database\Seeders;

use App\Models\Movie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $movie = Movie::factory()->count(100000)->make();

        $movie->chunk(10000)->each(function($chunk) {
            DB::table('movies')->insert($chunk->toArray());
        });
    }
}
