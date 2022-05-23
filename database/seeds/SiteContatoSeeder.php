<?php

use App\SiteContato;
use Illuminate\Database\Seeder;

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
        // $contato->nome = 'Sistem SG';
        // $contato->telefone = '(11) 99999-9999';
        // $contato->email = 'testesitecontato@gmail.com';
        // $contato->motivo_contato = 1;
        // $contato->mensagem = 'Seja bem-vindo ao sistema Super Gestão!';

        // $contato->save();

        // versão 8 do laravel \App\Models\SiteContato::factory()->count(100)->create();

        factory(SiteContato::class, 100)->create();

    }
}
