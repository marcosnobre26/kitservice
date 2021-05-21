<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KitNet extends Model
{
    use HasFactory;

    protected $table = 'kit_nets';
    
    protected $fillable = ['number', 'image', 'qtd_bedrooms','qtd_bathrooms','value','condominium_id'];

}
