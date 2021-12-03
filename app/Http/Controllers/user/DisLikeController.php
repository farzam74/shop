<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Dislike;
use App\Models\Like;
use Illuminate\Http\Request;

class DisLikeController extends Controller
{
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
        $comment_id=$request->comment_id;
        $user_id=auth()->user()->id;

        //check if user has disliked this comment before
        $result=Dislike::query()->where('comment_id','=',$comment_id)->where('user_id','=',$user_id)->first();
        if($result == null){
            Dislike::query()->create(compact('comment_id','user_id'));
            return back();
        }

        return back()->with('disliked','شما قبلا این کامنت را دیسلایک کرده اید.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
}
