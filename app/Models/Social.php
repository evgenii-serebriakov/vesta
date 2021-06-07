<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'text',
        'color',
        'icon',
        'path',
        'flag'
    ];

    // protected $dateFormat = 'F j, Y, g:i a';
}
