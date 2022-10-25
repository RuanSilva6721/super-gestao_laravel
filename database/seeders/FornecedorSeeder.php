<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Fornecedor;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fornecedor = new Fornecedor();

        $fornecedor->name  = 'RuanSeeder';
        $fornecedor->site =  'RuanSeeder.com.br';
        $fornecedor->uf = 'Pa';
        $fornecedor->email = 'RuanSeeder@Teste';

        $fornecedor->save();


        Fornecedor::create(['name'=> 'RuanCreate', 'site'=> 'RuanCreate.com.br', 'uf' => 'Pa', 'email'=> 'RuanCreate@Teste' ]);

    }
}
