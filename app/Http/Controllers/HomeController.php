<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::user()->role == 1)
            return view('admin.dashboard');
        return view('welcome');
    }
    public function new_daily(){
        $p = Product::all()->reverse()->take(4);
        return view('welcome' , ['new_daily' => $p]);
    }
}
