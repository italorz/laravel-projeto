<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Automovel extends Model
{
    protected $table = 'automoveis';
    protected $fillable = ['nome', 'placa', 'chassi', 'montadora_id'];

    public function montadora(){
        return $this->belongsTo(Montadora::class);
    }
}
