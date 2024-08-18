<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customers_Model;

class Customers_Controller extends Controller
{
    //
    public function index(){
        $data = Customers_Model::all();

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
       
        $data = Customers_Model::create([
            "fname" => $request->fname,
            "lname" => $request->lname,
            "contact" => $request->contact,
            "email" => $request->email,
            "address" => $request->address,
            "city" => $request->city,
            "province" => $request->province,
            "zipcode" => $request->zipcode,
            "password" => $request->password,
            "image" => $request->image
        ]);

        if ($data) {
            return response()->json([
                'status' => 200,
                'message' => 'Account created successfully',
                'data' => $data
            ]);
        } else {
            return response()->json([
                'status' => 400,
                'message' => 'Failed to create account'
            ]);
        }
    }
}
