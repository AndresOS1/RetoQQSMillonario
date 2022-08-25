<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Preguntas extends Model
{
    use HasFactory;


     
    protected $table  = "preguntas";

    protected $primaryKey = "id_preguntas";


    protected $fillable = ['pregunta'];

    protected $hidden = ['id_preguntas'];
}
