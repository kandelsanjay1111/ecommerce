<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends Model
{
    use HasFactory;

    protected $table='products_attr';

    public function color()
    {
        return $this->belongsTo('App\Models\Color','color_id');
    }

    public function size()
    {
        return $this->belongsTo('App\Models\Size','size_id');
    }
}
