<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Event;
use app\Models\Tag;

class EventTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Event :: factory()
         -> count(10) 
         -> create()
         -> each(function($tag) {
            $events = Event::inRandomOrder() -> limit(5) ->get();

         });
    }
}
