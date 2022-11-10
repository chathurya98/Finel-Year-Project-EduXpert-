<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class caption_add extends Model
{
    use HasFactory;
    protected $fillable=[
        'id',
        'video_id',
        'caption'
    ];
}
