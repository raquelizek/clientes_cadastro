<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CadastroClientes extends Model
{
    protected $primaryKey = 'cliente_ID';
    protected $fillable = ['nome', 'cpf', 'email', 'telefone', 'endereco'];
    public $table = 'cliente';
}
if (!Schema::hasTable('cliente')) {
    Schema::create('cliente', function (Blueprint $table) {
        $table->increments('cliente_ID');
        $table->string('nome');
        $table->string('cpf')->unique();
        $table->string('email');
        $table->string('telefone');
        $table->string('endereco');
        $table->timestamps();
        $table->rememberToken();
    });
}
