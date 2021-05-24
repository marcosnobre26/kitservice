<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Condominium extends Model
{
    use HasFactory;
    
    protected $fillable = ['name', 'image','address'];

    protected $table = 'condominiums';

    public function kitnets()
    {
        return $this->hasMany(KitNet::class);
    }
}
