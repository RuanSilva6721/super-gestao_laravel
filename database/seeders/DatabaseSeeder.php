<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use \App\Models\SiteContato;



class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(10)->create();
        $this->call(FornecedorSeeder::class);
        $this->call(SiteContatoSeeder::class);
    }
}
