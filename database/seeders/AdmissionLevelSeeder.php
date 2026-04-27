<?php

namespace Database\Seeders;

use App\Models\AdmissionLevel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdmissionLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AdmissionLevel::create(['level' => 'Undergraduate', 'abbreviation' => 'UG']);
        AdmissionLevel::create(['level' => 'Postgraduate', 'abbreviation' => 'PG']);
        AdmissionLevel::create(['level' => 'Diploma/Certificate', 'abbreviation' => 'D']);
        AdmissionLevel::create(['level' => 'Doctoral', 'abbreviation' => 'Ph.D']);
        AdmissionLevel::create(['level' => 'Language', 'abbreviation' => 'Lang']);
        AdmissionLevel::create(['level' => 'MBBS', 'abbreviation' => 'MBBS']);
        AdmissionLevel::create(['level' => 'BDS', 'abbreviation' => 'BDS']);
    }
}
