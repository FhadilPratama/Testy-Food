<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'description_2',
        'visi',
        'misi',
        'image1',
        'image2',
        'image3',
        'image4',
        'image5',
    ];

}
