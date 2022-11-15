<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConsumptionRecord extends Model
{
    use HasFactory;

    protected $fillable = ['amount','date','hour'];


    public function animal()
    {
        return $this->belongsTo(Animal::class);
    }
    public function food()
    {
        return $this->belongsTo(Food::class);
    }
}
