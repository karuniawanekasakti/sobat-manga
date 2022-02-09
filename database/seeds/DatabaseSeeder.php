<?php

use Illuminate\Database\Seeder;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        User::create([
            'name' => 'admin',
            'email' => 'admin@mail.com',
            'password' => bcrypt('admin'),
            'is_admin' => '1'
        ]);

    }
}
