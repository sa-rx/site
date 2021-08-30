<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\Auth;



class CommentController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }

    public function store(Request $request , Article $article){

      $request->validate([
        'content'=> 'required'
      ]);

      $request['user_id'] = Auth::id();

      $article->comments()->create($request->all());
      return redirect()->back();
    }
}
