<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class distributors extends Model
{
    use HasFactory;
    protected $table = 'distributors';
    protected $fillable = [
        // 'id_distributor',
        'code',
        'name',
        'country_code',
        'contact',
        'city_id',
        'province_id',
        'is_active',
        'address',
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
             $model->id_distributor = Uuid::uuid4()->toString();
         });
     }

     public function city()
     {
         return $this->belongsTo(City::class);
     }
     
     public function province()
     {
         return $this->belongsTo(Province::class);
     }

     public function distributor_products()
    {
        return $this->hasMany(distributor_products::class);
    }
}

