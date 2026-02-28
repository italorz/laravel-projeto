<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Montadora extends Model
{
    protected $table = 'montadoras';
    protected $fillable = ['nome'];

    public function automoveis(){
        return $this->hasMany(Automovel::class);
    }
}
