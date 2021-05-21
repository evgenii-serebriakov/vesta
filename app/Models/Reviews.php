<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'video',
        'image',
        'alt'
    ];

    // public function getImageAttribute($value)
    // {
    //     return Storage::url("images/" . $value);
    // }
}
