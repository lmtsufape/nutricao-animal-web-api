<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Snack extends Model
{
    use HasFactory;

    protected $fillable = ['amount','animal_id'];


    public function food()
    {
        return $this->belongsTo(Food::class);
    }
    public function menus()
    {
        return $this->belongsToMany(Menu::class,'menu_snacks','snack_id','menu_id');
    }
}
