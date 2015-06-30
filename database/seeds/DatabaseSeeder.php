<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Suporte\User;

class DatabaseSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        //Model::unguard();
        // $this->call('UserTableSeeder');
        DB::table('users')->delete();

        User::create(array(
            'name' => 'Administrador',
            'username' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin'),
        ));

        $this->command->info('Administrador carregados na base: usário - admin, email - admin@admin.com, senha - admin');

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
