<?php

use Illuminate\Database\Seeder;
use App\Admin;
class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
          'name'  => 'Mithun halder',
          'email'  => 'halderm86@gmail.com',
          'phone'  => '+8801828307745',
          'email_verified_at'  => now(),
          'password'  => bcrypt('secret'),
        ]);
    }
}
