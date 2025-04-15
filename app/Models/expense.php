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
}
