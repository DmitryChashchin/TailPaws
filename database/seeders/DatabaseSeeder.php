<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Enums\EventType;
use App\Models\Event;
use App\Models\Pet;
use App\Models\PetNames;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(3)->create();

        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
        ]);


        $pets = Pet::factory(3)->create();

        foreach ($pets as $pet) {
            Event::create([
                'pet_id' => $pet->id,
                'user_id' => 1,
                'title' => 'Прибыл ' . $pet->name,
                'type' => EventType::Intake,
                'date' => date('d-m-Y'),
                'pet_condition' => 'healthy'
            ]);

            PetNames::create([
                'pet_id' => $pet->id,
                'user_id' => 1,
                'pet_name' => $pet->name,
                'start_date' => date('d-m-Y')
            ]);
        }

    }
}
