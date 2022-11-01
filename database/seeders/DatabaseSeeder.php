<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\GenreMovie;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //\App\Models\User::factory(10)->create();

//        for ($i = 1; $i < 11; $i++) {
//            for ($j = 1; $j < 8; $j++) {
//                DB::table('genre_movie')->insert([
//                    'movie_id' => $i,
//                        'genre_id' => $j,
//                ]);
//            }
//        }

        $this->call([
            UserSeeder::class,
            CountrySeeder::class,
            GenreSeeder::class,
            MovieSeeder::class,
            CommentSeeder::class,
        ]);
    }
}
