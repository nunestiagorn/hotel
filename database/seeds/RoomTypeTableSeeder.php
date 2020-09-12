<?php

use App\Models\RoomType;
use Illuminate\Database\Seeder;

class RoomTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roomTypes = [
            [
                'id'             => 1,
                'name'           => 'Quarto Simples',
                'description'    => 'Quarto Simples',
                'created_at'     => now(),
            ],
        ];

        RoomType::insert($roomTypes);
    }
}
