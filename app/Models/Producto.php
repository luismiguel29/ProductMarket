<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class producto extends Model
{


    //use HasFactory;
    protected $table = "producto";
    protected $primaryKey = "IDPROD";
    protected $fillable = ['IDNEG','IDCAT','NOMBREPROD', 'PRECIONORMAL', 'PRECIODESC','STOCKPROD', 'FECHAVENPROD', 'DESCRIPPROD','URL_IMG'];
    public $timestamps = false;

    //enlaceProductoCategoria

    public function categoria(){

        return $this->belongsTo(Categoria::class,'IDCAT');
    }


}
