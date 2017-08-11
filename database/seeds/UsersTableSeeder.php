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
        factory(App\User::class, 100)->create();

        DB::table('users')->where('id', 1)->update([
            'department_id' => 1,
            'group_id'      => 1,
            'name'          => '张学征',
            'gender'        => 'male',
            'city'          => '佛山',
            'job'           => 'PHP工程师',
            'email'         => 'zhangxuezheng@myzaker.com',
            'password'      => bcrypt('123456'),
            'is_admin'      => true,
        ]);
    }
}
