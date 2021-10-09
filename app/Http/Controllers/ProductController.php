<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=Product::all();
        return view('products/index',compact('products'));
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
     * @param Product $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $category=$product->category()->first();


        $gallery=json_decode($product->other_img);

        //primary attributes makes from pivot table:
        $attributes=[];
        foreach ($product->attributes as $attribute){
            $attributes[][$attribute->attribute()->first()->key]=$attribute->attribute()->first()->value;
        }

        // to insert value of duplicate keys like color in one array element:
        $uniqueAtts=[];
        foreach ($attributes as $attribute){

            $key=key($attribute);

            if(!array_key_exists($key,$uniqueAtts)){
                $uniqueAtts[$key]=$attribute[$key];
            }
            else{
                $uniqueAtts[$key]=$uniqueAtts[$key].",".$attribute[$key];
            }
        }

        //untitled attributes:
        $otherAtts=json_decode($product->other_atts);

        //untitled attributes in one string file:
        $otherAttsP='';
        foreach ($otherAtts as $attribute){
            $otherAttsP=$otherAttsP.','.$attribute;
        }
        $otherAttsP=substr($otherAttsP,1);

    if (Session::exists('sortComments')) {
        if (Session::get('sortComments') == 'likes') {
            $comments = Comment::with('likes')->get()->sortByDesc(function ($comment) {
                return $comment->likes->count();
            });
            $comments = $comments->where('status', '=', 'approved')->where('product_id', '=', $product->id);
        }
    }
    else
    {
        $comments=Comment::query()->latest()->get();
        $comments=$comments->where('status','=','approved')->where('product_id','=',$product->id);

    }



        return view('product',compact('product','category'))
            ->with('gallery',$gallery)
            ->with('attributes',$attributes)
            ->with('otherAtts',$otherAtts)
            ->with('uniqueAtts',$uniqueAtts)
            ->with('otherAttsP',$otherAttsP)
            ->with('comments',$comments);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function sortByLike()
    {
        Session::put('sortComments','likes');

        return back();

    }

    public function sortByDate()
    {
        if (Session::exists('sortComments')) {
            Session::forget('sortComments');
        }
        return back();
    }
}
