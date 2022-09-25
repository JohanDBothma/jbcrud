<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $id = 1;
        \App\Models\Language::factory()->createMany(
            [
                [
                    'id' => $id,
                    'name' => 'English US',
                ],
                [
                    'id' => ++$id,
                    'name' => 'English UK',
                ],
                [
                    'id' => ++$id,
                    'name' => 'Afrikaans',
                ],
                [
                    'id' => ++$id,
                    'name' => 'Xhosa',
                ],
                [
                    'id' => ++$id,
                    'name' => 'Zulu',
                ],
                [
                    'id' => ++$id,
                    'name' => 'Sotho',
                ],
                [
                    'id' => ++$id,
                    'name' => 'French',
                ],
                [
                    'id' => ++$id,
                    'name' => 'German',
                ],
            ]
        );
    }
}
