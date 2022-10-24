<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    //use HasFactory;
    protected $table="categoria";
    protected $primaryKey="IDCAT";
    protected $fillable=['NOMBRE_CAT'];

    public function producto(){

        return $this->hasMany(Producto::class,'IDCAT');
    }


}
