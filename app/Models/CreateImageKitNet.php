<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CreateImageKitNet extends Model//retirar banheiro e colocar metros quadrados
{
    use HasFactory;

    protected $table = 'image_kit_net';
    
    protected $fillable = ['image'];

}
