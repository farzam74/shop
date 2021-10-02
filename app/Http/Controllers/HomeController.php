<?php

namespace App\Http\Controllers;

use App\Models\AmazingOffer;
use App\Models\Category;
use App\Models\Slider;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function index()
    {
        $sliders=Slider::all();
        $amazingOffers=AmazingOffer::all();
        $categories=Category::all();


        return view('index')->with('sliders',$sliders)
            ->with('amazingOffers',$amazingOffers)
            ->with('categories',$categories);
    }
}
