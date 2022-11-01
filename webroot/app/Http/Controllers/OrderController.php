<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        // $order = $request->all();
        // $client = json_decode(json_encode($client), true);
        // dd($order);

        return view('order-form',['client' => $request->all()]);
    }

     /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function saveOrder(Request $request)
    {
        $data = $request->except('_token');
        $serial_number = $data['serial_number'];
        $order = [];
        if (DB::table('order')->where('serial_number', $serial_number)->count() == 0) {
            $accessories = $data['accessories'];
            $accessories = json_encode($accessories);            
            $data['accessories'] = $accessories;
            // dd($data);
            $id = DB::table('order')->insertGetId($data);
            $order = DB::table('order')->find($id);
            $order = json_decode(json_encode($order), true);
            // dd($order);
        }    
        // dd($order);
        return redirect()->route('orderSuccess', $order);
    }

    public function orderSuccess(Request $request)
    {
        $order = $request->all();
        // Client ;
        $client = DB::table('client')->find($order['client_id']);
        $client = json_decode(json_encode($client), true);
        // Device ;
        $acces = ['cape','charger','cable'];
        $util = ['capinha' ,' carregador' ,' cabo'];
        $i = ['[',']','"'];
        $order['accessories'] = str_replace($acces, $util, $order['accessories']);
        $order['accessories'] = str_replace($i, '', $order['accessories']);
        
        // Serviccess ;
        $service = DB::table('services')->get();
        // $order['accessories'] = $order['accessories'] = $order['accessories'] ?  str_replace($i,'',$order['accessories']): '';
        // dd($order['accessories']);
        // dd($value);
        // array_push($order, $client);
        // dd($service);

        return view('order-success',['order' => $order, 'client' => $client, 'service' => $service]);
    }

    public function saveService(Request $request)
    {
        $service = $request->all();
        $service['value'] = str_replace(",",".",$service['value']);
        $description = $service['description'];
        if (DB::table('services')->where('description', $description)->count() > 0) {
            // dd("passou if");
            return "registered";
        }
        // dd($service);
        $id = DB::table('services')->insertGetId($service);
        // $client = json_decode(json_encode($client), true);
        // dd($service);

        return $id;
    }


}
