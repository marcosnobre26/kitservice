<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KitNets extends Model
{
    use HasFactory;
    
    protected $fillable = ['number', 'image', 'qtd_bedrooms','qtd_bedrooms','value','condominium_id'];

}
