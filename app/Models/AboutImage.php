<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
    ];
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($aboutImage) {
            $aboutImage->image = $aboutImage->image ?: 'default_image.jpg';
        });
    }
}