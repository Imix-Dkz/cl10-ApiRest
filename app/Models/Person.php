<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    //Se define la tabla a la que apunta el modelo
    protected $table = "person";
    //Luego los campos
    protected $fillable = [ 'name', 'addres', 'phone'];

}
