<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class expense extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'id';
    protected $table="expense";
    protected $fillable = [
        'id',
        'name',
        'price',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id'); // 'id' là khóa chính của bảng Khachhang
    }
}
