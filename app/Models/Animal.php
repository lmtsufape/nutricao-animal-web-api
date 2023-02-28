<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    protected $fillable = [
        'name','sex','is_castrated','activity_level','weight','height','breed_id',
        'image'
    ];
    public function users()
    {
        return $this->belongsToMany(User::class,'user_animals','animal_id','user_id');
    }
    public function biometry()
    {
        return $this->hasOne(Biometry::class);
    }
    public function menu()
    {
        return $this->hasOne(Menu::class);
    }
    public function foods()
    {
        return $this->hasManyThrough(Food::class,Menu::class);
    }
   
    public function records()
    {
        return $this->hasMany(ConsumptionRecord::class);
    }

    public function breed()
    {
        return $this->hasOne(Breed::class,'breed_id');
    }



}
