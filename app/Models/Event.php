<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    //Itens vai ser tratado como array, não uma string
    protected $casts = [
        'itens' => 'array'
    ];

    //Para o laravel entender que o campo é do tipo date
    protected $dates = ['date'];
}
