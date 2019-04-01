<?php

use Illuminate\Database\Seeder;

class TagThreadTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tag_thread')->insert([
            'tag_id' => 1,
            'thread_id' => 2
        ]);

        DB::table('tag_thread')->insert([
            'tag_id' => 2,
            'thread_id' => 2
        ]);
    }
}
