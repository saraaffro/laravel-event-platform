<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tag;
use App\Models\Event;
class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      
       $tags = Tag::factory()
        ->count(10)
        ->create();
        foreach ($tags as $tag) {

        $events = Event::inRandomOrder()->limit(2)->get();
        $tag->events()->attach($events);
        }
    }
}