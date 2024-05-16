<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class assignments extends Model
{
    use HasFactory;

    protected $fillable = [
        'clg_id',
        'dep_id',
        'title',
        'dec',
        'type',
        'link',
        'ucode',
        'added_by',
    ];
}
