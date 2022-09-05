<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnimalController extends Controller
{
    protected $fillable = ['nome','sexo','castracao','nivel_atividade'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function biometria()
    {
        return $this->hasOne(Biometria::class);
    }
    public function cardapio()
    {
        return $this->hasOne(Cardapio::class);
    }
}
