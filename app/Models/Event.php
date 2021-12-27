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

    //tudo o que for enviado pelo post, pode ser atualizado sem restrição
    protected $guarded = [];

    //Usuário que é dono do evento, pertence ao model User(o evento tem um usuário)
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    //Usuário pode participar de muitos eventos
    public function users()
    {
        return $this->belongsToMany('App\Models\User');
    }
}
