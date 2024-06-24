<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Genre extends Model
{
    use HasFactory;
    use HasTranslations;
    public $translatable = ['name'];
    protected $fillable = [
        'id',
        'name'
    ];

    public function serie()
    {
        return $this->hasMany(Serie::class);
    }
    public function movie()
    {
        return $this->hasMany(Movie::class);
    }
}
