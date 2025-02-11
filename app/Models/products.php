<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class products extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $fillable = [
        'id_product',
        'name',
        'serial_number',
        'photo',
        'photo_original',
        'is_active',
        'weight',
    ];

     // Define the key type as UUID
     protected $keyType = 'string';

     // Disable incrementing for UUIDs
     public $incrementing = false;
 
     // Generate UUID before saving the model
     protected static function boot()
     {
         parent::boot();
 
         static::creating(function ($model) {
             $model->id_product = Uuid::uuid4()->toString();
         });
     }

     public function distributor_products()
     {
         return $this->hasMany(distributor_products::class);
     }
}
