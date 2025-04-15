<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class detail extends Model
{
    // protected $table = 'chitietdonhang';
    public $timestamps = false;
    protected $primaryKey = 'id';
    protected $table="detail";
    protected $fillable = [
        'id_user',
        'id_expense',
        'name',
        'date',
        'price',
    ];
}
