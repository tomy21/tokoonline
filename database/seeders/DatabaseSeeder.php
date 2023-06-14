<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
<<<<<<< HEAD
=======

use App\Models\M_resi;
>>>>>>> 26eb251dbc1473054dd32c63e1837c02099f03f2
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
<<<<<<< HEAD
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
=======
        M_resi::factory(10)->create();
>>>>>>> 26eb251dbc1473054dd32c63e1837c02099f03f2
    }
}
