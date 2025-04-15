<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\detail;

class DetailController extends Controller
{
    public function index(){
        return view('expense.create');
    }

    public function handlecreate(Request $request){
        $detail = new detail();
        $detail->id_user = $request->input('id');
        $detail->name = $request->input('name');
        $detail->date = $request->input('date');
        $detail->price = $request->input('price');
        $detail->save();
        return response()->json([
            'message' => 'Product added to cart!',
        ]);
    }
}
