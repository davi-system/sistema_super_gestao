<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = ['nome', 'descricao', 'peso', 'unidade_id'];

    public function produtoDetalhe() {
        // relacionamento de 1 para 1 com Eloquent ORM do Laravel
        return $this->hasOne('App\ProdutoDetalhe');
    }
}
