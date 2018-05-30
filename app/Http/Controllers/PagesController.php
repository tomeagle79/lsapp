<?php

namespace App\Http\Controllers;

class PagesController extends Controller
{
    public function index()
    {
        $title = 'Welcome to Laravel, this is a dynamic title';
        //return view('pages.index', compact('title'));
        return view('pages.index')->with('title', $title);
        // look in the pages folder within views for the index view
        // compact() passes in the variable title so it can be used in the template
        // ->with() is another way to do the same thing the first argument is how we refer to the variable in the view
    }

    public function about()
    {
        $title = 'About Us';

        return view('pages.about')->with('title', $title); // look in the pages folder within views for the about view
    }

    public function services()
    {
        return view('pages.services'); // look in the pages folder within views for the services view
    }
}
