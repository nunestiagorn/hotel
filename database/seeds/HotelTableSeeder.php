<?php

use App\Models\Hotel;
use Illuminate\Database\Seeder;

class HotelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $hotels = [
            [
                'id'             => 1,
                'name'           => 'Hotel Exemplo',
                'description'    => 'Descrição Exemplo',
                'created_at'     => now(),
            ],
        ];

        Hotel::insert($hotels);
    }
}
