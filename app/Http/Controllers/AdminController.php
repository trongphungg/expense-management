<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\expense;
use App\Models\User;
use App\Models\detail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index(){
        return view('admin.login');
    }


    public function login(Request $request){
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
       

        if (Auth::attempt($credentials)) {
            if (Auth::user()->role == 1) {
                return redirect()->route('dashboard'); 
            } else {
                return redirect('/');
            }
            dd($credentials);
        }
        return redirect()->back();
    }

    public function dashboard(){
        $dskh = User::all();
        $cpbb = expense::all();
        $data = detail::all();
        $expense = expense::all();
        return view('admin.dashboard',compact('dskh','cpbb','data','expense'));
    }

    public function create(){
        $dskh = User::all();
        return view('admin.create',compact('dskh'));
    }

    public function handleCreate(Request $request){
        try{
            $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->image = $user->name .'.png';
        $user->password = null;
        $user->role = 0;
        $user->save();
        return redirect()->route('create')->with('success', 'Tạo người dùng thành công!');
        }catch(QueryException $e){
            return redirect()->back()
            ->with('error','Đã có lỗi xảy ra khi tạo người dùng!');
        }
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

    public function changePassword(){
        $user = user::where('role',1)->first();
        return view('admin.changePassword',compact('user'));
    }


    public function handleChangePass(Request $request){
        $user = User::where('email', $request->email)
        ->update([
            'password' => Hash::make($request->password)
        ]);
        return redirect('/dashboard');
    }

    public function handleDeleteUser($id){
        $user = user::where('id',$id);
        $user->delete();
        return redirect('/create');
    }

    public function handleDeleteExpense($id){
        $expense = expense::where('id',$id);
        $expense->delete();
        return redirect('/createExpense');
    }
}
