<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{

    public function __construct()
    {
      $this->middleware('auth')->except('show');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $articles = Article::orderBy('id','DESC')->get();
      return view('articles.index',compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('title','id');
        return view('articles.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

              $request->validate([
                'title'=> 'max:50|min:1|required',
                'content'=> 'max:1000|min:1|required',
                'categories'=>'required'
              ]);

        $user =Auth::user();

        $categories = array_values($request->categories);
        $article = $user->articles()->create($request->except('categories'));
        $article->categories()->attach($categories);


        return redirect()->to('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request , Article $article)
    {

        if(Auth::id() != $article->user_id){
          return abort(401);
        }


        $categories = Category::pluck('title','id');
        $articleCategorise = $article->categories()->pluck('id')->toArray();

        return view('articles.edit', compact('categories','article', 'articleCategorise'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {

      if(Auth::id() != $article->user_id){
        return abort(401);
      }

      $request->validate([
        'title'=> 'max:50|min:1|required',
        'content'=> 'max:1000|min:1|required',
        'categories'=>'required'
      ]);

        $article->update($request->all());
        $article->categories()->sync($request->categories);
        return redirect()->to('/home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {

      if(Auth::id() != $article->user_id){
        return abort(401);
      }

        $article->delete();
        return  redirect()->to('/home');
    }
}
