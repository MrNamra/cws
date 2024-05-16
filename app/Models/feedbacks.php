<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class feedbacks extends Model
{
    use HasFactory;

    protected $fillable = [
        'clg_id',
        'dep_id',
        'ass_id',
        'sender_name',
        'sender_email',
        'title',
        'dec',
        'type',
    ];
}
