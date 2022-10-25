<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use \App\Models\SiteContato;

class SiteContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $SiteContato = new SiteContato();

        $SiteContato->name  = 'RuanSeeder';
        $SiteContato->phone  = '00000000';
        $SiteContato->reason_for_contact =  1;
        $SiteContato->message = 'TMNC';

        $SiteContato->save();


        SiteContato::create(['name'=> 'RuanCreate', 'phone'=> '11111111', 'reason_for_contact' => 2, 'message'=> 'TMNC2' ]);

    }

}
