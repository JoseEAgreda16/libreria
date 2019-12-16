<?php

use Illuminate\Database\Seeder;

class StatusOrderTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $newStatus =
            [
                [
                    'name' => 'solicitado'
                ],
                [
                    'name' => 'aprobado'
                ],
                [
                    'name' => 'denegado'
                ],
                [
                    'name' => 'en uso'
                ],
                [
                    'name' => 'devuelto'
                ],
                [
                    'name' => 'cancelado'
                ]
            ];
        \App\Order_Status::insert($newStatus);
    }
}
