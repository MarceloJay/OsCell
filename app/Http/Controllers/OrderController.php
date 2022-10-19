<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    // public function __construct()
    // {
    //     return view('order-form');
    // }

     /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function createOrder(Request $request)
    {
        // $request->all();
        // $client = json_decode(json_encode($client), true);
        // dd($request);

        return view('order-form',['client' => $request->all()]);
    }

     /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function editOrder()
    {
        return view('order-edit');
    }

}
