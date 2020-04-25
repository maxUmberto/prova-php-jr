<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        [
//            'name' => 'Max Umberto Santos',
//            'cpf' => '09441254681',
//            'birthday' => '1997-07-03',
//            'address' => 'Rua Itaboraí, 18',
//            'uf' => 'RJ',
//            'city' => 'Seropédica'
//        ],
       DB::table('users')->insert([
            'name' => 'Fulano de Tal',
            'cpf' => '00000000000',
            'birthday' => '2000-01-01',
            'phone' => '2199998888',
            'address' => 'Rua Teste, 18',
            'uf' => 'RJ',
            'city' => 'Rio De Janeiro',
           'created_at' => date("Y-m-d H:i:s"),
           'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('users')->insert([
            'name' => 'Ciclano de Tal',
            'cpf' => '11111111111',
            'birthday' => '2001-01-01',
            'phone' => '2177776666',
            'address' => 'Rua Da Hora, 18',
            'uf' => 'RJ',
            'city' => 'Niterói',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);

        DB::table('users')->insert([
            'name' => 'Beltrano de Tal',
            'cpf' => '11111111111',
            'birthday' => '2002-01-01',
            'phone' => '3511119999',
            'address' => 'Rua Da Alegria, 18',
            'uf' => 'MG',
            'city' => 'Belo Horizonte',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
    }
}
