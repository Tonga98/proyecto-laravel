<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;
    //Asigno atributo fillable para poder generar con el seed
    protected $fillable = [
        'user_id',
        'image_id',
        'updated_at',
        'created_at',
    ];

    //Tabla con la que trabaja el modelo
    protected $table = "likes";

    //Relacion one-to-one
    public function user(){
        return $this->belongsTo('App/User','user_id');
    }

    //Relacion one-to-one
    public function images(){
        return $this->belongsTo('App/Image','image_id');
    }
}

