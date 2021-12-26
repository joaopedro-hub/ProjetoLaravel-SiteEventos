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

    //Usuário que é dono do evento, pertence ao model User(o evento tem um usuário)
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
