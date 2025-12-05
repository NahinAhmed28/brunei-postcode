<?php

namespace Database\Seeders;

use App\Models\District;
use App\Models\Kampong;
use App\Models\Mukim;
use Illuminate\Database\Seeder;

class PostcodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dataset = [
            [
                'name' => 'Brunei-Muara',
                'mukims' => [
                    [
                        'name' => 'Berakas A',
                        'kampongs' => [
                            ['name' => 'Anggerek Desa', 'postcode' => 'BB3713'],
                            ['name' => 'Lambak Kiri', 'postcode' => 'BB2114'],
                            ['name' => 'Serusop', 'postcode' => 'BB2115'],
                        ],
                    ],
                    [
                        'name' => 'Kota Batu',
                        'kampongs' => [
                            ['name' => 'Kampong Sungai Besar', 'postcode' => 'BD2117'],
                            ['name' => 'Pelambayan', 'postcode' => 'BD1717'],
                        ],
                    ],
                ],
            ],
            [
                'name' => 'Tutong',
                'mukims' => [
                    [
                        'name' => 'Pekan Tutong',
                        'kampongs' => [
                            ['name' => 'Bukit Bendera', 'postcode' => 'TA1341'],
                            ['name' => 'Petani', 'postcode' => 'TA1343'],
                        ],
                    ],
                    [
                        'name' => 'Telisai',
                        'kampongs' => [
                            ['name' => 'Lumat', 'postcode' => 'TG2345'],
                        ],
                    ],
                ],
            ],
        ];

        foreach ($dataset as $districtData) {
            $district = District::create(['name' => $districtData['name']]);

            foreach ($districtData['mukims'] as $mukimData) {
                $mukim = Mukim::create([
                    'district_id' => $district->id,
                    'name' => $mukimData['name'],
                ]);

                foreach ($mukimData['kampongs'] as $kampongData) {
                    Kampong::create([
                        'mukim_id' => $mukim->id,
                        'name' => $kampongData['name'],
                        'postcode' => $kampongData['postcode'],
                    ]);
                }
            }
        }
    }
}
