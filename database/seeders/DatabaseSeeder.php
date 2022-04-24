<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\ReservationForm;
use App\Models\FormField;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        ReservationForm::factory()
            ->count(10)
            ->has(FormField::factory()->count(3))
            ->create()
            ;
    }
}
