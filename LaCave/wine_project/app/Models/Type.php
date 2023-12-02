<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['type','appelation']; 
    
    public function wines()
    {
        return $this ->hasMany(Wine::class); 
    }

    
    //Un type correspond à plusieurs vins
}
