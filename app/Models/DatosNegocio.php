<?php

namespace App\Models;

use Vinkla\Hashids\Facades\Hashids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Propaganistas\LaravelFakeId\RoutesWithFakeIds;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DatosNegocio extends Model
{
    use RoutesWithFakeIds;
    //use HasFactory;
    protected $table="negocio";
    protected $primaryKey="idnegocio";
    protected $fillable = ['nombre', 'direccion', 'horarioinicio', 'horariofin', 'telefono', 'url','email', 'password'];

    public $timestamps = false;

    /* protected function idnegocio(): Attribute
    {
        return  Attribute::make(
            get: fn ($value) => Hashids::encode($value)
        );
    } */


}
