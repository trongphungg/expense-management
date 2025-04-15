<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\detail;
use App\Models\expense;
use App\Models\User;


class TotalController extends Controller
{
    public function index($id){
        $data = detail::all();
        $expense = expense::all();
        $user = User::where('id',$id)->first();
        return view('expense.total',compact('data','expense','user'));
    }

    public function finish(){
        
    }
}
