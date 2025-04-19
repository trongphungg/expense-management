<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\detail;
use App\Models\User;

class DetailController extends Controller
{
    public function index($id){
        $user = User::where('id',$id)->first();
        return view('expense.create',compact('user'));
    }

    public function handlecreate(Request $request){
        $detail = new detail();
        $detail->id_user = $request->input('id');
        $detail->name = $request->input('name');
        $detail->date = $request->input('date');
        $detail->price = $request->input('price');
        $detail->note = $request->input('note');
        $detail->save();
        return response()->json([
            'message' => 'Product added to cart!',
        ]);
    }
}
