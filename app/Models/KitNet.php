<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KitNet extends Model//retirar banheiro e colocar metros quadrados
{
    use HasFactory;

    protected $table = 'kit_nets';
    
    protected $fillable = ['number', 'image', 'qtd_bedrooms',
    'qtd_bathrooms','value','condominium_id','description'];

    public function condominium()
    {
        return $this->belongsTo(Condominium::class);
    }

    public function imagens()
    {
        return $this->belongsToMany(CreateImageKitNet::class,'image_kit_net','kit_net_id')
            ->withPivot('image','kit_net_id','image_id')
            ->withTimestamps();
    }

}
