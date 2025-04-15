<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\detail;
use App\Models\expense;
use App\Models\User;

use App\Mail\ThongBaoMail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;


class TotalController extends Controller
{
    public function index($id){
        $data = detail::all();
        $expense = expense::all();
        $user = User::where('id',$id)->first();
        return view('expense.total',compact('data','expense','user'));
    }

    public function finish(){
        $dskh = User::all();
        $tongchitieu=0;
        $soluongUser = User::count();

        $dsct = detail::all();
        $dscp = expense::all();
        foreach($dsct as $ct)
            $tongchitieu += $ct->price;
        foreach($dscp as $cp){
            $tongchitieu += $cp->price;
        }
        $tbtien=$tongchitieu / $soluongUser;
// Bước 1: Gom tổng chi tiêu theo id_user
    $tongChiTieuTheoUser = [];
    foreach ($dsct as $ct) {
    if (!isset($tongChiTieuTheoUser[$ct->id_user])) {
        $tongChiTieuTheoUser[$ct->id_user] = 0;
    }
    $tongChiTieuTheoUser[$ct->id_user] += $ct->price;
}

// Bước 2: Gửi mail cho từng khách hàng
    foreach ($dskh as $kh) {
    $ctcn = $tongChiTieuTheoUser[$kh->id] ?? 0;
    $sotien = $ctcn - $tbtien;
    $sotien= ceil($sotien);
    $name = $kh->name;

    if ($sotien < 0) {
        $flag = -1;
    } elseif ($sotien > 0) {
        $flag = 1;
    } else {
        $flag = 0;
    }

    Mail::to($kh->email)->send(new ThongBaoMail($name, $sotien, $flag));
}

    DB::table('detail')->truncate();
    return view('email.finish');
    }
}
