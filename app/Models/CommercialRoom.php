<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommercialRoom extends Model//mesma coisa dos atibutos de kitnets com apenas algumas diferenças
{
    use HasFactory;
    
    protected $fillable = ['number', 'image', 'qtd_bedrooms',
    'value', 'address','description'];

    protected $table = 'commercial_room';
}
