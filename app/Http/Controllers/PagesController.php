<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PagesController extends Controller
{
    public function index(){
        return view('pages.index'); // look in the pages folder within views for the index view
    }

    public function about(){
        return view('pages.about'); // look in the pages folder within views for the about view
    }

    public function services(){
        return view('pages.services'); // look in the pages folder within views for the services view
    }
}
