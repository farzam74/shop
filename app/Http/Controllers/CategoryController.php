<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use  App\Traits\ProductsOfMainCategoryTrait;

class CategoryController extends Controller
{
    use ProductsOfMainCategoryTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {

        //define sliders of product of subcategories of this category

        $sliders=[];


        $categories=Category::all();

        //get all subcategories of this category
        $thisCategories=$this->getNestedSubCategories($categories,$category);


        //array of the categories that haven't any child
        $innermostCategories=$this->getInnermostCategories($thisCategories);


        //get all products of innermost categories
        $products=$this->getProductsOfCategories($innermostCategories);


        //get random 4 products of innermost categories to show in sliders
        if(count($innermostCategories)>=4){

            $keys=array_rand($innermostCategories,4);
            foreach ($keys as $key){

                if($innermostCategories[$key]->products()->get()->shuffle()->first() != null)
                {
                    array_push($sliders,$innermostCategories[$key]->products()->get()->shuffle()->first());
                }
            }


        }


        else{

                    //get 4 random product to show in sliders if products are more than 4
                    if(count($products)>=4){
                        shuffle($products);

                        for($i=0;$i<4;$i++){
                            $sliders[]=$products[$i];
                        }
                    }

                    //get all products if products are less than 4
                    else{
                       $sliders=$products;
                    }


            }





        $amazingOffers=[];

        foreach ($products as $product){
            if($product->amazingOffer()->first() != null){
                array_push($amazingOffers,$product->amazingOffer()->first());
            }
        }


        $products=$category->products()->paginate();

        return view('category')
            ->with('category',$category)
            ->with('sliders',$sliders)
            ->with('amazingOffers',$amazingOffers)
            ->with('innermostCategories',$innermostCategories)
            ->with('products',$products);


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
