<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       \App\Models\User::factory(10)->create();
       \App\Models\Event::factory(10)->create();
       \App\Models\Participant::factory(20)->create();
       \App\Models\Picture::factory(30)->create();
       \App\Models\Dump::factory(10)->create();
    }
}
