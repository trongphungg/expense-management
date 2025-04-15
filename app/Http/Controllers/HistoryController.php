<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\detail;

class HistoryController extends Controller
{
    public function index($id){
        $user = User::where('id',$id)->first();
        $data = detail::where('id_user',$id)->get();
        return view('expense.history',compact('user','data'));
    }
}
