<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(){
        return view('home');
    }

    public function about(){
        return view('about');
    }
    public function article(){
        return view('article');
    }
    public function contact(){
        return view('contact');
    }
    public function contactForm(Request $request){
      // print_r($_POST);
        return  view('contact', ["data" => $request, 
                                 "title"=> "Info recu"]);
    }
}
