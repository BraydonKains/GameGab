<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            'content' => 'Seriously every Fortnite player is 12',
            'poster_id' => 7,
            'thread_id' => 2
        ]);

        DB::table('posts')->insert([
            'content' => "I'm 13 actually!",
            'poster_id' => 3,
            'thread_id' => 2
        ]);
    }
}
