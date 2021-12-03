<?php

namespace App\Traits;

trait ProductsOfMainCategoryTrait{

    public function getNestedSubCategories($categories,$category)
    {
        $thisCategories=[];

        foreach ($categories as $key=>$subCategory){

            while ($subCategory->parentCategory()->first() != null){
                $subCategory=$subCategory->parentCategory()->first();
            }
            if ($subCategory->id==$category->id){
                array_push($thisCategories,$categories[$key]);
            }
        }
        return $thisCategories;
    }


    public function getInnermostCategories($categories)
    {
        $innermostCategories=[];   //array of the categories that haven't any child

        foreach ($categories as $category){

            if($category->subCategories()->first() == null){
                array_push($innermostCategories,$category);
            }
        }
        return $innermostCategories;
    }

    public function getProductsOfCategories($categories)
    {
        $products=[];
        foreach ($categories as $category) {

            $innerProducts = $category->products()->get();
            foreach ($innerProducts as $product) {
                array_push($products, $product);
            }
        }
        return $products;
    }
}
