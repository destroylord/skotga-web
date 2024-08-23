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
        'slug',
        'description',
        'attachments',
    ];

    protected $casts = [
        'attachments' => 'json',
    ];

    protected static function booted(): void
    {
        static::deleted(function (Post $post) {
            foreach ($post->attachments as $attachment) {
                Storage::delete("public/news/{$attachment}");
            }
        });

        static::updating(function (Post $post) {

            $imagesToDelete = array_diff( $post->getOriginal('attachments'), $post->attachments);

            foreach ($imagesToDelete as $attachment) {
                Storage::delete("public/news/{$attachment}");
            }
        });
    }
}
