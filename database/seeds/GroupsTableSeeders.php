<?php

use Illuminate\Database\Seeder;

class GroupsTableSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 9; $i++){
            DB::table('groups')->insert([
                'name' => "Groups $i"
            ]);
        }
    }
}
