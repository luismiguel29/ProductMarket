<?php

namespace App\Models;

use Vinkla\Hashids\Facades\Hashids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Categoria extends Model
{
    //use HasFactory;
    protected $table = "categoria";
    protected $primaryKey = "idcategoria";
    protected $fillable = ['nombre', 'url'];
    public $timestamps = false;

    /* protected function idcategoria(): Attribute
    {
        return  Attribute::make(
            get: fn ($value) => Hashids::encode($value)
        );
    } */

}
