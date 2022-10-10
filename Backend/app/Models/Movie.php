<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{   
    public $table = 'movie';
    use HasFactory;
    protected $fillable = [
        'name',
        'file_size',
        'file',
        'path'
    ];
    public function tag(){
        return $this->belongsToMany(Tag::class, 'movie_tag');
    }
}
