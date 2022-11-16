<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    
    public function animal()
    {
        return $this->belongsTo(Animal::class);
    }
    
    public function snacks()
    {
        
        return $this->belongsToMany(Snack::class,'menu_snacks','menu_id','snack_id');
    }
}
