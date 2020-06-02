<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Admin::create([
            'name'      => 'Admin',
            'email'     => 'admin@app.com',
            'password'  => bcrypt(123456)
        ]);
    }
}
