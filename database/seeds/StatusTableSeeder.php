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
                    'name' => 'agotado'
                ],
                [
                    'name' => 'aprobado'
                ],
                [
                    'name' => 'denegado'
                ],
                [
                    'name' => 'solicitado'
                ],

                [
                    'name' => 'Descontinuado'
                ]
            ];
        \App\Book_Status::insert($newStatus);

    }
}
