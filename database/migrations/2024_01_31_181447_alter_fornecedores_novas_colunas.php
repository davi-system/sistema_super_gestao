<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterFornecedoresNovasColunas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        # adicionando campos
        # troquei o create por table
        Schema::table('fornecedores', function (Blueprint $table) {
            $table->string('uf', 2);
            $table->string('email', 150);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        # rollback
        # php artisan migrate:rollback -> volta uma migrate
        # php artisan migrate:rollback --step=2 -> coloque a qtde de migrate que você quer voltar
        Schema::table('fornecedores', function (Blueprint $table) {
            $table->dropColumn(['uf', 'email']);
        });
    }
}
