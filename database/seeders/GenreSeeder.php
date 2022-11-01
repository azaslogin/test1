<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $genres = [
            ["title" => "Action", "description" => "shooting"],
            ["title" => "Adventure", "description" => "Trip"],
            ["title" => "Comedy", "description" => "Laughable"],
            ["title" => "Horror", "description" => "Laughable"],
            ["title" => "Drama", "description" => "drama"],
            ["title" => "Melodrama", "description" => "slezi"],
            ["title" => "Kyrgyscha", "description" => "kg"],
        ];
        Genre::insert($genres);
    }
}
