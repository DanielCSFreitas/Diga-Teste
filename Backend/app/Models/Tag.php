<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{   
    public $table = 'tag';
    use HasFactory;

    public function movie(){
        return $this->belongsToMany(Movie::class, 'movie_tag');
    }
}
