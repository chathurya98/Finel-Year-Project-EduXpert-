<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class c_courses extends Model
{

    // access the databse tables coloumns
    use HasFactory;
    protected $fillable=[
        'id',
        'name'
    ];
}
