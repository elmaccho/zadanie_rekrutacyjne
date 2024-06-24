<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'title',
        'plot',
        'poster_path',
        'genre'
    ];

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }
}
