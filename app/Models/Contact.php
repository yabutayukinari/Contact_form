<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $fillable = [
        'fullname',
        'firstname',
        'lastname',
        'gender',
        'email',
        'postcode',
        'address',
        'building_name',
        'opinion'
    ];
    public static function put()
    {
        // 処理
    }
}
