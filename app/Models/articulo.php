<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class producto extends Model
{
    //use HasFactory;
    protected $table = "categoria";
    //protected $primaryKey = "IDCAT";
    protected $fillable = ['IDCAT','NOMBRE_CAT'];
    public $timestamps = false;
}
