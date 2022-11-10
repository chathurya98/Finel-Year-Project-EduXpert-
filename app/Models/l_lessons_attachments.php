<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class l_lessons_attachments extends Model
{
    use HasFactory;
    protected $fillable=[
        'id',
        'lesson_id',
        'type',
        'attachment',
        'drive_id',
        'attachment_name',
    ];
}
