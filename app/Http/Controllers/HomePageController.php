<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\OrderRequest;
use App\{
    Sitesetting,
    Page,
    Category,
    Service,
    Order
    };

use Session;

class HomePageController extends Controller
{
    


    public function index(){
        return view('front.index');
    }

    
    public function aboutus(){
        $results = Page::findOrFail(1);
        return view('front.pages', compact('results'));
    }


    public function contactus(){
        $results = Page::findOrFail(2);
        return view('front.pages', compact('results'));
    }



    public function category(){
        $results = Category::where('is_active', 1)->get();
        return view('front.category', compact('results'));
    }


    public function services($id){
        $category  =  Category::findOrFail($id);
        return view('front.service', compact('category'));
    }


    public function details($id){
        $results = Service::findOrFail($id);
        return view('front.details', compact('results'));
    }


    public function order(){
        $categories  = Category::pluck('title', 'id');
        return view('front.orders', compact('categories'));
    }

    public function ordersave(OrderRequest $request){
        Order::create($request->all());
        Session::flash("msg", "s: شكراً لك, لقد تم إرسال الطلب بنجاح, وسوف تتم المتابعة معك خلال أقرب وقت");
        return redirect()->route('order');
    }


}
