<?php

use Illuminate\Database\Seeder;

class tableRolsId extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $newrolsid =
            [
                [
                    'name' => 'administrators',
                    'type_id' => '1'
                ],
                [
                    'name' => 'users',
                    'type_id' => '2'
                ]
            ];
        \App\Rol::insert($newrolsid);
    }
}
