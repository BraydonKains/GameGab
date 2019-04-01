<?php

use Illuminate\Database\Seeder;

class ThreadsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $titles = array([
            "WHY ARE THERE SO MANY ASSASSIN'S CREED GAMES", "This new Yoshi game is awesome!", "I am better at Fortnite than all my friends I am 12",
            "This new Yoshi game is awesome!", "OMG!!! Bowser took over Nintendo!", "Grant Kirkhope the best video game composer ever?",
            "The coolest Devil May Cry V autocombos", "Sekiro should respect it's playerbase and add an easy mode", "Is everyone who plays Fortnite 12 years old?"
        ]);
        
        for($i = 0; $i<9; $i++) {
            DB::table('threads')->insert([
                'thread_title' => $titles[$i],
                'thread_creator_id' => $i+2
            ]);
        }

        DB::table('threads')->insert([
            'thread_title' => "Welcome to GameGab!",
            'thread_creator_id' => 1
        ]);
    }
}
