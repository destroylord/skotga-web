<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'short_desc',
        'hero_image',
        'vision',
        'mission',
        'link_youtube',
        'logo',
    ];
}
