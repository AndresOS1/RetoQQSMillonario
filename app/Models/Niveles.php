<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Niveles extends Model
{
    use HasFactory;

     
    protected $table  = "niveles";

    protected $primaryKey = "id_niveles";


    protected $fillable = ['nivel'];

    protected $hidden = ['id_niveles'];
}
