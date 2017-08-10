<?php

use Illuminate\Database\Seeder;

class GroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Group::class, 50)->create();

        DB::table('groups')->where('id', 1)->update([
            'department_id' => 1,
            'name'          => '后端组',
        ]);

        DB::table('groups')->where('id', 2)->update([
            'department_id' => 1,
            'name'          => '前端组',
        ]);
    }
}
