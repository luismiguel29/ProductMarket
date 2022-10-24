<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DatosNegocio extends Model
{
    //use HasFactory;
    protected $table="negocio";
    protected $primaryKey="IDNEG";
    protected $fillable = ['NOMBRENEG', 'DIRECIONNEG', 'HORARIOAPERTURA', 'TELEFONONEG', 'HORARIOCIERRE'];
    public $timestamps = false;
}
