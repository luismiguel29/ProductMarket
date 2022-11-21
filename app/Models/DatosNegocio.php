<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DatosNegocio extends Model
{
    //use HasFactory;
    protected $table="negocio";
    protected $primaryKey="idnegocio";
    protected $fillable = ['nombre', 'direccion', 'horarioinicio', 'horariofin', 'telefono', 'url'];

    public $timestamps = false;
}
