<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class distributor_products extends Model
{
    use HasFactory;

    protected $table = 'distributor_products';
    protected $fillable = [
        'id_distributor_product',
        'distributor_id',
        'product_id',
        'serial_number',
        'is_active',
    ];

    

     public function distributors()
     {
         return $this->belongsTo(distributors::class, 'distributor_id');
     }
     


     public function products()
     {
        return $this->belongsTo(products::class, 'product_id');
    }
}
