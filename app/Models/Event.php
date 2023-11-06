<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    // Especifica o tipo de items como um array
    protected $casts = [
        'items' => 'array'
    ];

    // Especifica o tipo de dates como um date
    protected $dates = ['date'];

    // Retira restrições sobre atualizar coisas do POST
    protected $guarded = [];

    // Associa um usuário aos eventos (pertence a um)
    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    // Associa a participação do usuário ao evento
    public function users(){
        return $this->belongsToMany('App\Models\User');
    }
}
