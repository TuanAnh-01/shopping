<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class HistoryController extends Controller
{
    //
    public function index() {
     
        $user_id =  Auth::user()->id;
        $history = DB::table('order')->orderBy('id', 'desc')->where('user_id', '=', $user_id)->get();
        return view('history_order')->with('history',$history);
    }

    public function orderDetail($id) {
     
        $order_detail = DB::table('item')->where('order_id', '=', $id)->get();
        return view('order_detail')->with('order_detail',$order_detail);
    }
}
