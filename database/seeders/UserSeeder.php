<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Document;
use App\Models\Media;
use App\Models\Language;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Creating Users
        User::factory(10)->create()->each(function ($user) {
            // Attach documents
            $user->documents()->saveMany(Document::factory(2)->make());

            // Attach media
            $user->media()->saveMany(Media::factory(3)->make());

            // Attach languages
            $user->languages()->attach(Language::inRandomOrder()->first()->id);

            // Optionally create more related entities
            // $user->reviews()->saveMany(Review::factory(2)->make());
            // $user->availableTimings()->saveMany(AvailableTiming::factory(3)->make());
        });
    }
}
