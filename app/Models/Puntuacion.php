<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Puntuacion extends Model
{
    use HasFactory;

 
    protected $table  = "puntuacion";

    protected $primaryKey = "id_puntuacion";


    protected $fillable = ['puntuacion', 'user_id'];

    protected $hidden = ['id_puntuacion'];

}
