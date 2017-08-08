<?php

use Illuminate\Database\Seeder;

class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Department::class, 10)->create();

        DB::table('departments')->where('id', 1)->update([
            'name' => '技术一部',
        ]);
    }
}
