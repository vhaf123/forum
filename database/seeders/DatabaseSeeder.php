<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Customer;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Storage::deleteDirectory('voucher');
        Storage::makeDirectory('voucher');

        $this->call(CustomerSeeder::class);
        Category::factory(4)->create();
        $this->call(BrandSeeder::class);
        $this->call(VoucherSeeder::class);
        $this->call(CodeSeeder::class);
    }
}
