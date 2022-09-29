<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    protected $fillable = ['name','sex','is_castrated','activity_level'];


    public function user()
    {
        return $this->belongsTo(User::class);
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



}
