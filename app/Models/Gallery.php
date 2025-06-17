<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = ['image_path', 'title'];

    // Sembunyikan title saat diberikan ke API
    protected $hidden = ['title'];
}
