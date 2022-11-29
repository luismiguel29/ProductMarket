<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class adriLista extends Model
{
       //use HasFactory;
       protected $table="negocio";
       protected $primaryKey="idnegocio";
       protected $fillable = ['email','password'];
   
       public $timestamps = false;
   }

