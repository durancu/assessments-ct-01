<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller {
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        //$this->middleware('auth');
    }
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        
        $path = storage_path() . "/json/data.json";
        $data = json_decode(file_get_contents($path), true);
        
        return view('home', compact('data'));
    }
    
    
    
    public function addProduct(Request $request) {
        $path = storage_path() . "/json/data.json";
        $data = json_decode(file_get_contents($path), true);
        if (!isset($data)){
            $data = [];
        }
        
        $attributes = $request->only('name', 'quantity', 'price');
        
        $attributes['datetime'] = Carbon::now()->toDateTimeString();
        $attributes['total_value'] = $attributes['price'] * $attributes['quantity'];
        
        array_push($data, $attributes);
        
        file_put_contents($path, json_encode($data));
        
        return response()->json($attributes);
    }
}
