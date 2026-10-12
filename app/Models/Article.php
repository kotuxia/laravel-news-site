<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'short_description',
        'content',
        'date',
        'preview_image',
        'full_image',
    ];

    protected $casts = [
        'date' => 'date',
    ];
}