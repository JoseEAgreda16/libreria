<?php

use Illuminate\Database\Seeder;

class TableUsersAdmin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $newuser = new \App\User();
        $newuser-> id_card = ('123');
        $newuser-> name = ('admin');
        $newuser-> surname = ('admin');
        $newuser-> email = ('admin@librando.com');
        $newuser-> password = bcrypt('admin');
        $newuser-> id_rol = 1;
        $newuser->save();
    }
}
