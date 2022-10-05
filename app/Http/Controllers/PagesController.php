<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PagesController extends Controller
{
   public function app() {
    return view('layouts.app', ["arr" => ["Technology", "Automotive", "Finance", "Politics", "Culture", "Sports"]]);
   }

   public function about() {
    return view('pages.about');
   }
   public function autom() {
    return view('pages.automotive');
   }
}