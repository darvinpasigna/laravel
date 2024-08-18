<?php

namespace App\Http\Controllers;
use App\Models\Ship_Model;

use Illuminate\Http\Request;

class Ship_Controller extends Controller
{
    //
    public function index(){
        $data = Ship_Model::all();

        if($data->count() > 0){
            return response()->json([
                'status' => 200,
                'data' => $data
                ]);
        }else{
            return response()->json([
                'status' => 404,
                'data' => "Not Found!"
                ]);
        }
    }

    public function store(Request $request)
    {
       
        $data = Ship_Model::create([
            "customer_name" => $request->customer_name,
            "customer_address" => $request->customer_address,
            "customer_contact" => $request->customer_contact,
            "prod_name" => $request->prod_name,
            "quantity" => $request->quantity,
            "price" => $request->price,
            "total_price" => $request->total_price,
            "main_img" => $request->main_img
        ]);

        if ($data) {
            return response()->json([
                'status' => 200,
                'message' => 'Success',
                'data' => $data
            ]);
        } else {
            return response()->json([
                'status' => 400,
                'message' => 'Failed'
            ]);
        }
    }
}
