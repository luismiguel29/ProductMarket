<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class producto extends Model
{
    //use HasFactory;
    protected $table = "producto";
    protected $primaryKey = "idproducto";
    protected $fillable = ['id_categoria', 'id_negocio', 'nombre', 'precio','preciodesc', 'stock', 
    'descripcion','url','fecha','fechainicio','fechafin','fechaven'];
    public $timestamps = false;
}
