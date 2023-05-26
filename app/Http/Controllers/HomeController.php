<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function home()
    {
        //
        $home = DB::table('banner')->get();
        $product_new = DB::table('product')->orderBy('id', 'desc')->where('sale', '=', 0)->get()->take(4);
        $product_sale = DB::table('product')->orderBy('sale', 'desc')->where('sale', '!=', 0)->get()->take(4);
        $branding = DB::table('branding')->orderBy('id', 'desc')->get()->take(6);
      
        return view('dashboard')->with('home', $home)->with('product_new', $product_new)->with('product_sale', $product_sale)->with('branding', $branding);
    }
}
