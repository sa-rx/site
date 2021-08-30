<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class PageController extends Controller
{


    public function __construct()
    {

    }


    public function index(){

      $articles = Article::take(3)->orderBy('id','DESC')->get();
      return view('index',compact('articles'));
    }


    public function contact(){

      $message = __('please fill in the form');
      $info = "remember we only work on <b>mondays</b>";
      $user = \Auth::user();
      $options = [
        'general' => 'general message',
        'development' => 'website development',
        'consultation' => 'cobsultation'
      ];

      return view('contact', compact('message','info','user','options'));
    }


    public function storeContant(Request $request){
        $validateDate = $request->validate([
            'sender_name'=>'required|max:10',
            'message'=>'required|min:20|max:50'
        ]);
        $request->session()->put('username', $request->sender_name);
      return "done!";
    }



    public function about(Request $request){
        $userName = $request->session()->get('username' );
      return view('about',['userName' => $userName]);
    }


    public function clearName(Request $request){
        $request->session()->flush();
        return redirect()->back();


    }


}
