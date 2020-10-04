<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $path = __DIR__ . './airports_seed.sql';
        DB::unprepared(file_get_contents($path));
        $this->command->info('airports table seeded');

        $path = __DIR__ . './purposes_seed.sql';
        DB::unprepared(file_get_contents($path));
        $this->command->info('purposes table seeded');

        User::create([
            'name' => 'Admin User',
            'email' => 'admin@user.com',
            'password' => Hash::make('flightlog')
        ]);

        // \App\Models\User::factory(10)->create();
    }
}
