<?php

namespace App\Http\Controllers;

use App\Models\AmazingOffer;
use App\Models\Category;
use App\Models\Slider;
use Illuminate\Http\Request;
use  App\Traits\ProductsOfMainCategoryTrait;


class HomeController extends Controller
{
    use ProductsOfMainCategoryTrait;

    public function index()
    {
        $sliders=Slider::all();
        $amazingOffers=AmazingOffer::all();
        $categories=Category::all();

        $mainCategories=[];
        $mainCategoriesProducts=[];

        foreach ($categories as $category){
            if($category->parentCategory()->first() == null){
                array_push($mainCategories,$category);
            }
        }


        foreach ($mainCategories as $mainCategory){
            $subCategories=$this->getNestedSubCategories($categories,$mainCategory);
            $innermostCategories=$this->getInnermostCategories($subCategories);

            $mainCategoriesProducts[]=[0 =>$mainCategory,
                                        1=>$this->getProductsOfCategories($innermostCategories)];

    }

        return view('index')->with('sliders',$sliders)
            ->with('amazingOffers',$amazingOffers)
            ->with('mainCategoriesProducts',$mainCategoriesProducts);
    }
}
