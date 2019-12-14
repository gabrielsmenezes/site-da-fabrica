<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Edital extends Model
{
    protected $fillable = ['titulo','descricao','data', 'arquivo'];
}
