<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function showPendings()
    {
        $pendings=Comment::query()->where('status','=','pending')->get();

        return view('vendor.voyager.comments.pendings',compact('pendings'));
    }
}
