<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InterestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $id = 1;
        \App\Models\Interest::factory()->createMany(
            [
                [
                    'id' => $id,
                    'name' => 'Reading'
                ],
                [
                    'id' => ++$id,
                    'name' => 'Wine Tasting'
                ],
                [
                    'id' => ++$id,
                    'name' => 'Rugby'
                ],
                [
                    'id' => ++$id,
                    'name' => 'Cricket'
                ],
                [
                    'id' => ++$id,
                    'name' => 'Soccer'
                ],
                [
                    'id' => ++$id,
                    'name' => 'Travelling'
                ],
                [
                    'id' => ++$id,
                    'name' => 'Cooking'
                ],
                [
                    'id' => ++$id,
                    'name' => 'Art'
                ],
                [
                    'id' => ++$id,
                    'name' => 'Video Games'
                ]
            ]
        );
    }
}
