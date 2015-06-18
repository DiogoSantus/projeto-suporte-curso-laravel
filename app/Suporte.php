<?php

namespace Suporte;

use Illuminate\Database\Eloquent\Model;

class Suporte extends Model {
    protected $fillable = ['nome', 'email', 'data', 'produto_id', 'descricao'];
}
