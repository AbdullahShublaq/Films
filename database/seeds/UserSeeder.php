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
        //
        \App\User::create([
            'username'      => 'UserName',
            'first_name'      => 'FirstName',
            'last_name'      => 'LastName',
            'email'     => 'user@app.com',
            'password'  => bcrypt(123456)
        ]);
    }
}
