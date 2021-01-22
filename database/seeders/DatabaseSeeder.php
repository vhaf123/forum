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

        Customer::factory(100)->create();
        // \App\Models\User::factory(10)->create();
        Category::factory(4)->create();
        Brand::factory(8)->create();

        $this->call(VoucherSeeder::class);
    }
}
