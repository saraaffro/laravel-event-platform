<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Event;
use App\Models\User;
use Illuminate\Database\Seeder;

class EventTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        // Event :: factory () -> count(10) -> create();

        Event :: factory() 
            -> count(10)
            -> make()
            -> each(function ($event) {
            
            $user = User :: inRandomOrder() -> first();
            $event -> user() -> associate($user);
            
            $event -> save();
        });

    }
}