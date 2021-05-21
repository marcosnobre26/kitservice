<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommercialRoom extends Model
{
    use HasFactory;
    
    protected $fillable = ['number', 'image', 'qtd_bedrooms','value'];

    protected $table = 'commercial_room';
}
