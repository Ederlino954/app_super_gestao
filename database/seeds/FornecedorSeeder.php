<?php

use Illuminate\Database\Seeder;
use App\Fornecedor;
use Illuminate\Support\Facades\DB;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //instanciando o objeto
        $fornecedor = new Fornecedor();
        $fornecedor->nome = 'Fornecedor 100';
        $fornecedor->site = 'www.fornecedor100.com';
        $fornecedor->uf = 'CE';
        $fornecedor->email = 'teste100@gmail.com';
        $fornecedor->save();

        // metodo create
        Fornecedor::create([
            'nome' => 'Fornecedor 200',
            'site' => 'www.fornecedor200.com',
            'uf' => 'RS',
            'email' => 'teste200@gmail.com'
        ]);

        DB::table('fornecedores')->insert([
            'nome' => 'Fornecedor 300',
            'site' => 'www.fornecedor300.com',
            'uf' => 'RS',
            'email' => 'teste300@gmail.com'
        ]);
    }
}
