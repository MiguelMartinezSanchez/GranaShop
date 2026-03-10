<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'precio', 'marca', 'foto', 'categoria'];

    public function categories()
    {
        return $this->belongsTo(Categories::class);
    }

    public function brands()
    {
        return $this->belongsTo(Brands::class);
    }

    //scopes ----------------------
    public function scopeBrand($query, $v)
    {
        if ($v == 1 || $v == 2 || $v == 3) {
            return $query->where('marca', $v);
        } else {
            return $query;
        }
    }
    //Mostrar datos tablas relacionadas 
    public static function brandsNombres()
    {
        $marcas = Brands::orderBy('id')->get();
        $miArray = [];
        foreach ($marcas as $marca) {
            $miArray[$marca->id] = $marca->nombre;
        }
        return $miArray;
    }

    public static function categoriesNombres()
    {
        $categorias = Categories::orderBy('id')->get();
        $miArray = [];
        foreach ($categorias as $categoria) {
            $miArray[$categoria->id] = $categoria->nombre;
        }
        return $miArray;
    }
}
