<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
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
    public function registration(float $id)
    {
        // print_r($id);
        // die();
        return view('registration-client',['id' => $id]);
    }

     /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function editClient()
    {
        return view('order-edit');
    }

    public function clientSave(Request $request) {

        $data =$request->except('_token');
        $id = DB::table('client')->insertGetId($data);
        // $client = DB::table('client')->select('name')->where('id' => $id);
        $client = DB::table('client')->find($id);
        $client = json_decode(json_encode($client), true);
        // dd($client);
        // return redirect()->action([OrderController::class, 'createOrder'],[$client]);
        return redirect()->route('createOrder', $client);
        //(route('createOrder'));
    }
}
