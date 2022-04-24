<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Company;
use App\Models\FieldChoice;
use App\Models\FieldOption;
use App\Models\FormField;
use App\Models\ReservationForm;
use App\Models\Service;
use App\Models\ServiceProvider;
use App\Models\User;
use App\Models\WorkSchedule;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $companies = Company::factory()
            ->count(10)
            ->has(User::factory()
                ->count(rand(1, 5))
                ->has(ServiceProvider::factory()
                    ->count(1)
                    ->has(WorkSchedule::factory()
                        ->count(5)
                    )
                )
            )
            ->has(Service::factory()
                ->count(5)
            )
            ->create()
            ;

        ReservationForm::factory()
            ->count(10)
            ->has(FormField::factory()
                ->count(3)
            )
            ->create()
            ;
    }
}
