<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\detail;
use App\Models\expense;
use App\Models\User;

use App\Mail\ThongBaoMail;
use App\Mail\MailAdmin;
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
        $dskh = User::all()->keyBy('id');
        $tongchitieu=0;
        $soluongUser = User::count();
        $dstiendong = [];

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
    foreach ($dscp as $cp) {
    if (!isset($tongChiTieuTheoUser[$cp->id_user])) {
        $tongChiTieuTheoUser[$cp->id_user] = 0;
    }
    $tongChiTieuTheoUser[$cp->id_user] += $cp->price;
}

// Bước 2: Gửi mail cho từng khách hàng
    $dstiendong = [];
$mailData = [];

foreach ($dskh as $kh) {
    $ctcn = $tongChiTieuTheoUser[$kh->id] ?? 0;
    $sotien = $ctcn - $tbtien;
    $name = $kh->name;

    if ($sotien < 0) {
        $flag = -1;
    } elseif ($sotien > 0) {
        $flag = 1;
    } else {
        $flag = 0;
    }

    $dstiendong[$kh->id] = $sotien;

    // Lưu dữ liệu cần thiết để gửi mail sau này
    $mailData[] = [
        'name' => $name,
        'email' => $kh->email,
        'flag' => $flag,
        'sotien' => $sotien,
        'ctcn' => $ctcn,
        'role' => $kh->role
    ];
}
foreach ($mailData as $data) {
    if ($data['role'] == 1) {
        Mail::to($data['email'])->send(new MailAdmin(
            $data['name'],
            $data['sotien'],
            $data['flag'],
            $data['ctcn'],
            $tbtien,
            $dstiendong,
            $dskh
        ));
    } else {
        Mail::to($data['email'])->send(new ThongBaoMail(
            $data['name'],
            $data['sotien'],
            $data['flag'],
            $data['ctcn'],
            $tbtien
        ));
    }
}


    DB::table('detail')->truncate();
    return view('email.finish');
    }
}
