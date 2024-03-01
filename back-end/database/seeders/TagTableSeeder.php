<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tag;
use app\Models\Event;
class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::factory()
        ->count(10)
        ->create()
        ->each(function ($tag) {
  
            $events = Event::inRandomOrder()->limit(2)->get();
            $tag -> events()->attach($events);
            });
    //    $tags = Tag::factory()
    //     ->count(10)
    //     ->create();
    //     foreach ($tags as $tag) {

    //     $events = Event::inRandomOrder()->limit(2)->get();
    //     $tag->events()->attach($events);
    //     }
    }
}