<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $table = "languages";
    //la clave primaria de esa tabla
    protected $primaryKey = "language_id";
    //omitir campos de auditoria
    public $timestamps = false;
    use HasFactory;

    //M:M Language - Country relationship
    public function pais()
    {
        return $this->belongsToMany(Country::class, 'country_languages', 'language_id', 'country_id');
    }
}