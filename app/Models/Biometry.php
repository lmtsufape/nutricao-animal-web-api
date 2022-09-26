<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biometry extends Model
{
    use HasFactory;

    protected $fillable = ['weight','height','animal_id'];


    public function animal()
    {
        return $this->belongsTo(Animal::class);
    }
}
