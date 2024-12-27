<?php

namespace Database\Seeders;

use App\Models\Portal;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Portal::insert(
            [
                ['name' => 'Maranhão', 'url' => 'https://g1.globo.com/ma/maranhao/'],
                ['name' => 'Piauí', 'url' => 'https://g1.globo.com/pi/piaui/'],
                ['name' => 'Ceará', 'url' => 'https://g1.globo.com/ce/ceara/'],
                ['name' => 'Rio Grande do Norte', 'url' => 'https://g1.globo.com/rn/rio-grande-do-norte/'],
                ['name' => 'Paraíba', 'url' => 'https://g1.globo.com/pb/paraiba/'],
                ['name' => 'Pernambuco', 'url' => 'https://g1.globo.com/pe/pernambuco/'],
                ['name' => 'Alagoas', 'url' => 'https://g1.globo.com/al/alagoas/'],
                ['name' => 'Sergipe', 'url' => 'https://g1.globo.com/se/sergipe/'],
                ['name' => 'Bahia', 'url' => 'https://g1.globo.com/ba/bahia/'],
            ]
        );
    }
}
