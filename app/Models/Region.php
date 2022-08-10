<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $table = "regions";
    //la clave primaria de esa tabla
    protected $primaryKey = "region_id";
    //omitir campos de auditoria
    public $timestamps = false;
    use HasFactory;

    //1 to m : Region - Country
    //Relationship

    public function countries()
    {
        return $this->hasMany(Country::class, 'region_id');
    }

    public function continent()
    {
        return $this->BelongsTo(Country::class, 'continent_id');
    }
}