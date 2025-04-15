<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\detail;
use App\Models\expense;


class TotalController extends Controller
{
    public function index(){
        $data = detail::all();
        $expense = expense::all();
        return view('expense.total',compact('data','expense'));
    }
}
