<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ClienteTable extends Migration
{
    /**
     * Rodar as migrations.
     *
     * @return void
     */
    public function up()
    {
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

    /**
     * Reverter as migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
