<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Niveles;

class NivelesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nivel=Niveles::create(['nivel'=>'1']);
        $nivel=Niveles::create(['nivel'=>'2']);
        $nivel=Niveles::create(['nivel'=>'3']);
        $nivel=Niveles::create(['nivel'=>'4']);
        $nivel=Niveles::create(['nivel'=>'5']);
    }
}
