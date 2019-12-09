<?php

use Illuminate\Database\Seeder;

class StatusTableSeeder extends Seeder
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
                    'name' => 'disponible'
                ],
                [
                    'name' => 'no disponible'
                ],
                [
                    'name' => 'fuera de servicio'
                ]
            ];
        \App\Book_Status::insert($newStatus);

    }
}
