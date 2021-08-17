<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommercialRoom extends Model//mesma coisa dos atibutos de kitnets com apenas algumas diferenças
{
    use HasFactory;

    protected $table = 'commercial_room';
    
    protected $fillable = ['number', 'image', 'qtd_bedrooms',
    'value', 'description','commercial_point_id','rate','status'];

    

    protected $hidden = [];

    public function commercialpoint()
    {
        return $this->belongsTo(CommercialPoint::class,'commercial_point_id');
    }
}
