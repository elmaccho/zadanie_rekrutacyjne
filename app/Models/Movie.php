<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Movie extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = ['title', 'plot'];
    protected $fillable = [
        'id',
        'title',
        'plot',
        'poster_path',
        'genre'
    ];

    public function genre()
    {
        return $this->belongsToMany(Genre::class);
    }
}
