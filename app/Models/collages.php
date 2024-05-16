<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class collages extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'short_name',
        'added_by',
    ];

    public function departments()
    {
        return $this->hasMany(departments::class);
    }
}
