<?php

use Illuminate\Database\Seeder;
use App\SiteContato;

class SiteContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $contato = new SiteContato();
        // $contato->nome = 'Davi';
        // $contato->telefone = '(14) 99999-8888';
        // $contato->email = 'davi@gmail.com';
        // $contato->motivo_contato = 1;
        // $contato->mensagem = 'Olá estou gostando do sistemas SG';
        // $contato->save();

        factory(SiteContato::class, 100)->create();
    }
}
