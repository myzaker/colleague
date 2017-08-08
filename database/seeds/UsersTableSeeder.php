<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'email'    => 'zhangxuezheng@myzaker.com',
            'password' => bcrypt('123456'),
            'is_admin' => true,
        ]);

        factory(App\User::class, 19)->create();
    }
}
