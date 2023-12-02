<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producteur extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['nom','region','information']; 
    
    public function wines()
    {
        return $this ->hasMany(Wine::class); //Un producteur produit plusieurs vins
    }

}
