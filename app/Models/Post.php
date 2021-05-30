<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title',
        'message',
        'image',
        'alt'
    ];

    protected $dateFormat = 'F j, Y, g:i a';

    public function getImageAttribute($value)
    {
        return Storage::url("images/" . $value);
    }
}
