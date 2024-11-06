<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\Guest;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GuestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Guest::factory()
            ->has(Address::factory()->count(5))
            ->hasPhones(2)
            ->count(10)->create();
    }
}
