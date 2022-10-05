<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home()
    {

        return view('pages.home', [
            "navigation" => ["Technology", "Automotive", "Finance", "Politics", "Culture", "Sports"]
        ]);
    }

    public function about()
    {
        return view('pages.about');
    }

    public function automotive()
    {
        return view('pages.automotive');
    }

    public function culture()
    {
        return view('pages.culture');
    }
}
