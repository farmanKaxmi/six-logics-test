<?php

use Illuminate\Database\Seeder;

class CompanyEmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Company::class, 10)->create()->each(function ($user) {
            $user->employees()->save(factory(App\Models\Employee::class)->make());
        });
    }
}
