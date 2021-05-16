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

    public function getImageAttribute($value)
    {
        return Storage::url("images/" . $value);
    }
}
