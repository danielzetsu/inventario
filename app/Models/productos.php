<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    protected $table = "public.productos";
    //protected $primaryKey = "id";
    protected $fillable =['nombre','referencia','precio','peso','categoria','stock','fecha'];


    public function productos()
    {
        return $this->hasMany(VentasProductos::class);
    }
}
 