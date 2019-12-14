<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Query\Builder;

class Projeto extends Model
{
    protected $fillable = ['nome','descricao', 'finalizado'];

    public function imagens()
    {
        return $this->hasMany(Imagem::class);
    }

}
