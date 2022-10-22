<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $countries = [
            ["title" => "Afghanistan", "description" => "Asia"],
            ["title" => "Åland Islands", "description" => "Europe"],
            ["title" => "Albania", "description" => "Europe"],
            ["title" => "Algeria", "description" => "Africa"],
            ["title" => "American Samoa", "description" => "Oceania"],
            ["title" => "Andorra", "description" => "Europe"],
            ["title" => "Angola", "description" => "Africa"],
            ["title" => "Anguilla", "description" => "North America"],
            ["title" => "Antarctica", "description" => "Antarctica"],
            ["title" => "Antigua and Barbuda", "description" => "North America"],
            ["title" => "Argentina", "description" => "South America"],
            ["title" => "Armenia", "description" => "Asia"],
            ["title" => "Aruba", "description" => "North America"],
            ["title" => "Australia", "description" => "Oceania"],
            ["title" => "Austria", "description" => "Europe"],
            ["title" => "Azerbaijan", "description" => "Asia"],
            ["title" => "Bahamas", "description" => "North America"],
            ["title" => "Bahrain", "description" => "Asia"],
            ["title" => "Bangladesh", "description" => "Asia"],
            ["title" => "Barbados", "description" => "North America"],
            ["title" => "Belarus", "description" => "Europe"],
            ["title" => "Belgium", "description" => "Europe"],
            ["title" => "Belize", "description" => "North America"],
            ["title" => "Benin", "description" => "Africa"]
        ];
        Country::insert($countries);
    }
}
