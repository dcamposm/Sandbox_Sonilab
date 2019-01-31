<?php

use Illuminate\Database\Seeder;
use App\Client;

class slb_clientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB:: table('slb_clients')->delete();
        Client:: create(array(
            'id_client'      => 1,
            'nom_client'     => 'Client 1',
            'email_client'   => 'client1@client.es',
            'telefon_client' => '111111111'
        ));
        Client:: create(array(
            'id_client'      => 2,
            'nom_client'     => 'Client 2',
            'email_client'   => 'client2@client.es',
            'telefon_client' => '222222222'
        ));
        Client:: create(array(
            'id_client'      => 3,
            'nom_client'     => 'Client 3',
            'email_client'   => 'client3@client.es',
            'telefon_client' => '333333333'
        ));
    }
}
