<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Forum extends Model
{
    use HasFactory;

    protected $table = 'forums'; //Especificamos la tabla, normalmente el plural del modelo, Forum en este caso

    protected $fillable = [ //--> Especificamos campo que rellenamos
        'name',
        'description',
        'slug'
    ];

    public function posts(): HasMany {
        return $this->hasMany(Post::class);
    }

    public function replies(): HasManyThrough {
        return $this->HasManyThrough(Reply::class,Post::class);
    }

    /*protected $hidden = [ Especificamos campos ocultos 
        'password',
    ];*/
}
