<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\expense;
use App\Models\User;

class AdminController extends Controller
{
    public function index(){
        return view('admin.login');
    }


    public function login(Request $request){
        if($request->username == "admin" && $request->password == "123"){
            return redirect()->route('dashboard');
        }
        else return view('admin.login');
    }

    public function dashboard(){
        $dskh = User::all();
        $cpbb = expense::all();
        return view('admin.dashboard',compact('dskh','cpbb'));
    }

    public function create(){
        $dskh = User::all();
        return view('admin.create',compact('dskh'));
    }

    public function handleCreate(Request $request){
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->image = $user->name .'.png';
        $user->save();
        return redirect()->route('createExpense');
    }

    public function createExpense(){
        $cpbb = expense::all();
        return view('admin.createExpense',compact('cpbb'));
    }

    public function handleCreateExpense(Request $request){
        $expense = new expense();
        $expense->name = $request->input('name');
        $expense->price = $request->input('price');
        $expense->save();
        return redirect()->route('createExpense');
    }
}
