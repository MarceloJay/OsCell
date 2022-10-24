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

        $data = $request->except('_token');
        $document = $data['document'];
        if (DB::table('client')->where('document', $document)->count() == 0) {
            $id = DB::table('client')->insertGetId($data);
            $client = DB::table('client')->find($id);
            $client = json_decode(json_encode($client), true);
        } else {
            $client = $data;
        }        

        return redirect()->route('createOrder', $client);
    }
    
    public function searchClient(String $name)
    {
        $client = DB::table('client')->where('name', 'like', '%' . $name . '%')->get();
        $client = json_decode(json_encode($client[0]), true);

        return $client;
    }
}
