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

        $department = \App\Department::find(1);

        $department->update([
            'head_id' => $department->staff()->skip(1)->first()->id,
            'name'    => '技术一部',
        ]);
    }
}
