<?php

namespace Database\Seeders;

use App\Models\Currency;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Currency::firstOrCreate([
            'name' => 'Việt Nam Đồng',
            'code' => 'VND',
            'symbol' => '₫',
            'format' => '{symbol}{amount}',
            'is_default' => true,
            'is_active' => true,
        ]);

        Currency::firstOrCreate([
            'name' => 'United States Dollar',
            'code' => 'USD',
            'symbol' => '$',
            'format' => '{symbol}{amount}',
            'is_default' => false,
            'is_active' => true,
        ]);

        Currency::firstOrCreate([
            'name' => 'Euro',
            'code' => 'EUR',
            'symbol' => '€',
            'format' => '{symbol}{amount}',
            'is_default' => false,
            'is_active' => true,
        ]);

        Currency::firstOrCreate([
            'name' => 'British Pound',
            'code' => 'GBP',
            'symbol' => '£',
            'format' => '{symbol}{amount}',
            'is_default' => false,
            'is_active' => true,
        ]);

        Currency::firstOrCreate([
            'name' => 'Japanese Yen',
            'code' => 'JPY',
            'symbol' => '¥',
            'format' => '{symbol}{amount}',
            'is_default' => false,
            'is_active' => true,
        ]);

        Currency::firstOrCreate([
            'name' => 'Australian Dollar',
            'code' => 'AUD',
            'symbol' => '$',
            'format' => '{symbol}{amount}',
            'is_default' => false,
            'is_active' => true,
        ]);

        Currency::firstOrCreate([
            'name' => 'Canadian Dollar',
            'code' => 'CAD',
            'symbol' => '$',
            'format' => '{symbol}{amount}',
            'is_default' => false,
            'is_active' => true,
        ]);

        Currency::firstOrCreate([
            'name' => 'Swiss Franc',
            'code' => 'CHF',
            'symbol' => 'Fr',
            'format' => '{symbol}{amount}',
            'is_default' => false,
            'is_active' => true,
        ]);

        Currency::firstOrCreate([
            'name' => 'Chinese Yuan',
            'code' => 'CNY',
            'symbol' => '¥',
            'format' => '{symbol}{amount}',
            'is_default' => false,
            'is_active' => true,
        ]);

        Currency::firstOrCreate([
            'name' => 'Hong Kong Dollar',
            'code' => 'HKD',
            'symbol' => '$',
            'format' => '{symbol}{amount}',
            'is_default' => false,
            'is_active' => true,
        ]);

        Currency::firstOrCreate([
            'name' => 'New Zealand Dollar',
            'code' => 'NZD',
            'symbol' => '$',
            'format' => '{symbol}{amount}',
            'is_default' => false,
            'is_active' => true,
        ]);

        Currency::firstOrCreate([
            'name' => 'Swedish Krona',
            'code' => 'SEK',
            'symbol' => 'kr',
            'format' => '{symbol}{amount}',
            'is_default' => false,
            'is_active' => true,
        ]);

        Currency::firstOrCreate([
            'name' => 'Singapore Dollar',
            'code' => 'SGD',
            'symbol' => '$',
            'format' => '{symbol}{amount}',
            'is_default' => false,
            'is_active' => true,
        ]);

        Currency::firstOrCreate([
            'name' => 'Norwegian Krone',
            'code' => 'NOK',
            'symbol' => 'kr',
            'format' => '{symbol}{amount}',
            'is_default' => false,
            'is_active' => true,
        ]);

        Currency::firstOrCreate([
            'name' => 'Mexican Peso',
            'code' => 'MXN',
            'symbol' => '$',
            'format' => '{symbol}{amount}',
            'is_default' => false,
            'is_active' => true,
        ]);

        Currency::firstOrCreate([
            'name' => 'Malaysian Ringgit',
            'code' => 'MYR',
            'symbol' => 'RM',
            'format' => '{symbol}{amount}',
            'is_default' => false,
            'is_active' => true,
        ]);

        Currency::firstOrCreate([
            'name' => 'Russian Ruble',
            'code' => 'RUB',
            'symbol' => '₽',
            'format' => '{symbol}{amount}',
            'is_default' => false,
            'is_active' => true,
        ]);

        Currency::firstOrCreate([
            'name' => 'Turkish Lira',
            'code' => 'TRY',
            'symbol' => '₺',
            'format' => '{symbol}{amount}',
            'is_default' => false,
            'is_active' => true,
        ]);

        Currency::firstOrCreate([
            'name' =>  'Cambodian Riel',
            'code' => 'KHR',
            'symbol' => '៛',
            'format' => '{symbol}{amount}',
            'is_default' => false,
            'is_active' => true,
        ]);

        Currency::firstOrCreate([
            'name' => 'Indonesian Rupiah',
            'code' => 'IDR',
            'symbol' => 'Rp',
            'format' => '{symbol}{amount}',
            'is_default' => false,
            'is_active' => true,
        ]);

        Currency::firstOrCreate([
            'name' => 'Laotian Kip',
            'code' => 'LAK',
            'symbol' => '₭',
            'format' => '{symbol}{amount}',
            'is_default' => false,
            'is_active' => true,
        ]);

        Currency::firstOrCreate([
            'name' => 'Philippine Peso',
            'code' => 'PHP',
            'symbol' => '₱',
            'format' => '{symbol}{amount}',
            'is_default' => false,
            'is_active' => true,
        ]);

        Currency::firstOrCreate([
            'name' => 'Thai Baht',
            'code' => 'THB',
            'symbol' => '฿',
            'format' => '{symbol}{amount}',
            'is_default' => false,
            'is_active' => true,
        ]);
    }
}
