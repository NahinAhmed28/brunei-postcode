<?php

namespace Database\Seeders;

use App\Models\District;
use App\Models\Kampong;
use App\Models\Mukim;
use Illuminate\Database\Seeder;

class BanglaPostcodeSeeder extends Seeder
{
    /**
     * Populate Bangla-friendly names for seeded locations.
     */
    public function run(): void
    {
        $districtTranslations = [
            'Brunei-Muara' => 'ব্রুনাই-মুয়ারা',
            'Tutong' => 'তুতং',
            'Belait' => 'বেলাইট',
            'Temburong' => 'তেমবুরং',
        ];

        District::query()->each(function (District $district) use ($districtTranslations) {
            $district->update([
                'name_bn' => $districtTranslations[$district->name] ?? $district->name,
            ]);
        });

        Mukim::query()->each(function (Mukim $mukim) {
            $mukim->update([
                'name_bn' => $mukim->name_bn ?? $mukim->name,
            ]);
        });

        Kampong::query()->each(function (Kampong $kampong) {
            $kampong->update([
                'name_bn' => $kampong->name_bn ?? $kampong->name,
            ]);
        });
    }
}
