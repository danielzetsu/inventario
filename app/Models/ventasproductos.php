<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class VentasProductos extends Model
{

    protected $table = "public.ventas_productos";
    //protected $fillable = ['cantidad', 'productos_id',];


    public function productos()
    {
        return $this->belongsTo(productos::class);
    }
}