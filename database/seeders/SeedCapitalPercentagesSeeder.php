<?php

namespace Modules\Incentivi\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeedCapitalPercentagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::connection('incentivi')->table('capital_percentages')->insert([
            'nome' => '2%',
            'descrizione' => '20.000 ≤ X ≤ Soglia',
            'valore' => 2,
        ]);
        DB::connection('incentivi')->table('capital_percentages')->insert([
            'nome' => '1,9%',
            'descrizione' => 'Soglia ≤ X ≤ 15.000.000',
            'valore' => 1.9,
        ]);
        DB::connection('incentivi')->table('capital_percentages')->insert([
            'nome' => '1,8%',
            'descrizione' => 'X ≥ 15.000.000',
            'valore' => 1.8,
        ]);
    }
}
