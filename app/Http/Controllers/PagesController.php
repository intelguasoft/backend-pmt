<?php

namespace Edgar\PMT\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        return view('frontend.welcome');
    }

    public function multas()
    {
        return view('frontend.multas');
    }
}
