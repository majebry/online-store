<?php

use Illuminate\Database\Seeder;
use App\Admin;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new Admin;
        $admin->name = 'Hani';
        $admin->email = 'hani@admin.ly';
        $admin->password = bcrypt("123");
        $admin->save();
    }
}
