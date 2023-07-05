<?php

namespace App\Models;
use App\Models\Comment;
use App\Models\Like;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{

    use HasFactory;

    //Con que tabla va  a trabajar el modelo
    protected $table="images";

    protected $fillable = [
        ' user_id',
        'image_path',
        'description',
        ' updated_at',
        'created_at'
    ];

    //hasMany retorna todos los comentarios con image_id = al id de la imagen actual
    //Relacion one-to-many
    public function comments(){
        return $this->hasMany(Comment::class);
    }

    //hasMany retorna todos los likes con image_id = al id de la imagen actual
    //Relacion one-to-many
    public function likes(){
        return $this->hasMany(Like::class);
    }

    //Relacion many-to-one
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
