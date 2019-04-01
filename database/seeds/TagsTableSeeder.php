<?php

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->insert([
            'tag_text' => "Fortnite",
            'creator_id' => 1
        ]);

        DB::table('tags')->insert([
            'tag_text' => "Multiplayer",
            'creator_id' => 1
        ]);
    }
}
