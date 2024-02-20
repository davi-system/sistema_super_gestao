<?php

use Illuminate\Database\Seeder;
// use App\MotivoContato;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(FornecedorSeeder::class);
        $this->call(SiteContatoSeeder::class);
        $this->call(MotivoContatoSeeder::class);
    }
}

// php artisan make:seeder NomeSeeder -> Criar os seeder
// php artisan db:seed -> Popular as tabelas
// php artisan db:seed --class=NomeSeeder -> Popula somente a tabela que você quer, sem duplicar informações
// OBS.: Configurar o arquivo DataBaseSeeder
