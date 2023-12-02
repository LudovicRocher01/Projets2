<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wine extends Model
{
    protected $fillable = ['Nom','Description','Degre_alcool','Image','type_id','producteur_id','Prix_vin']; 
    use HasFactory;

    public $timestamps = false;
    public function producteur()
    {
        //un vin n'a qu'un seul producteur 
        return $this->belongsTo(Producteur::class);
    }

    
    public function type()
    {
        //un vin ne correspond qu'à un seul type
        return $this->belongsTo(Type::class);
    }


    
}
