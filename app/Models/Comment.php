<?php

namespace App\Models;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    //Asigno atributo fillable para poder generar con el seed
    protected $fillable = [
        'user_id',
        'image_id',
        'content',
        'updated_at',
        'created_at'
    ];
    //Tabla con la que trabaja el modelo
    protected $table = "comments";

    //Relacion one-to-one
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    //Relacion one-to-one
    public function images(){
        return $this->belongsTo(User::class,'image_id');
    }

}
