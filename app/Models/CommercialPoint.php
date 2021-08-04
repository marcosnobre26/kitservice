<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommercialPoint extends Model//mesma coisa dos atibutos de kitnets com apenas algumas diferenças
{
    use HasFactory;
    
    protected $fillable = ['name', 'address'];

    protected $table = 'commercial_points';

    public function commercialrooms()
    {
        return $this->hasMany(CommercialRoom::class);
    }
}
