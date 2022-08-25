<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuestionario extends Model
{
    use HasFactory;



    protected $table  = "cuestionario";

    protected $primaryKey = "id_cuestionario";


    protected $fillable = ['user_id','categoria_id','pregunta_id'];

    protected $hidden = ['id_cuestionario'];
}
