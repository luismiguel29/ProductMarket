<?php

namespace App\Models;

use Vinkla\Hashids\Facades\Hashids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class producto extends Model
{
    //use HasFactory;
    protected $table = "producto";
    protected $primaryKey = "idproducto";
    protected $fillable = ['id_categoria', 'id_negocio', 'nombre', 'precio','preciodesc', 'stock', 
    'descripcion','url','fecha','fechainicio','fechafin','fechaven'];
    public $timestamps = false;

    /* protected function idproducto(): Attribute
    {
        return  Attribute::make(
            get: fn ($value) => Hashids::encode($value)
        );
    } */

}
