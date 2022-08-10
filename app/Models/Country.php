<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = "countries";
    //la clave primaria de esa tabla
    protected $primaryKey = "country_id";
    //omitir campos de auditoria
    public $timestamps = false;
    use HasFactory;

    //relacion entre continente y sus regiones
    public function languages()
    {
         //belongsToMany Method:
         //1. Related  Model
         //2. pivot table(intermediate table)
         //3. Foreign key of current model
         //4. Foreign key of related model

         return $this->belongsToMany(Language::class, 'country_languages','country_id', 'language_id')->withPivot('official');
    }   

    //M:1 country - region relationship
    public function regions()
    {
        //Belongs To Method: Parameters
        //1. Related Model
        //2. Foreign key of related model in current model
        
        return $this->belongsTo(Region::class, 'region_id');
    }
}