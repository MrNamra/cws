<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class departments extends Model
{
    use HasFactory;

    protected $fillable = [
        'clg_id',
        'full_name',
        'long_name',
        'added_by',
    ];

    public function college()
    {
        return $this->belongsTo(collages::class);
    }
}
