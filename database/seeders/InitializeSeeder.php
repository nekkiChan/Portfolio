<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Database\Seeders\dbtables\InitM101Seeder;

class InitializeSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(InitM101Seeder::class);
    }
}
