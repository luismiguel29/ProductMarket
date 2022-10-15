<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class producto extends Model
{
    //use HasFactory;
    protected $table = "producto";
    protected $primaryKey = "IDPROD";
    protected $fillable = ['IDNEG', 'NOMBREPROD', 'PRECIONORMAL', 'PRECIODESC','STOCKPROD', 'FECHAVENPROD', 'DESCRIPPROD'];
    public $timestamps = false;
}
