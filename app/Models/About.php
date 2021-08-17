<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model//mesma coisa dos atibutos de kitnets com apenas algumas diferenças
{
    use HasFactory;

    protected $table = 'about_us';
    
    protected $fillable = ['about'];

    

    protected $hidden = [];

}
