<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        //Model::unguard();

        // $this->call('UserTableSeeder');
        
        DB::table('produtos')->delete();

        Suporte\Produto::create(['nome' => 'Monitor']);
        Suporte\Produto::create(['nome' => 'CPU']);
        Suporte\Produto::create(['nome' => 'Mouse']);
        Suporte\Produto::create(['nome' => 'Teclado']);
        Suporte\Produto::create(['nome' => 'Impressora']);
        Suporte\Produto::create(['nome' => 'Pen Drive']);
        
        $this->command->info('Produtos carregados na base');
    }

}
