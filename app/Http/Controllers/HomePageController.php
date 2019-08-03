<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\{
    Sitesetting,
    Page,
    Category,
    Service
    };

class HomePageController extends Controller
{
    


    public function index(){
        return view('front.index');
    }

    
    public function about(){
        $results = Page::findOrFail(1);
        return view('front.about', compact('results'));
    }


    public function contactus(){
        $results = Page::findOrFail(2);
        return view('front.contact', compact('results'));
    }


    public function category(){
        $results = Category::where('is_active', 1)->get();
        return view('front.category', compact('results'));
    }


    public function order(){
        return view('front.orders');
    }


    public function services($id){
        $results = Service::where('category_id', $id)->where('is_active', 1)->paginate(8);
        $category = Category::find($id)->title;
        return view('front.service', compact('results', 'category'));
    }


    public function details($id){
        $results = Service::findOrFail($id);
        return view('front.details', compact('results'));
    }


}
