<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TShirt extends Model
{
    use HasFactory;

    protected $fillable = [
        'size',
        'color',
        'sexe',
        'mergeImageUrl'
    ];


}
