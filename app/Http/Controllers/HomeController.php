<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Sitesetting;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $sitename  = Sitesetting::first()->title;
        return view('home', compact('sitename'));
    }
}
