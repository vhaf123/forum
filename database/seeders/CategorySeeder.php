<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Code;
use App\Models\Voucher;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = Category::factory(4)->create();

        foreach ($categories as $category) {
            $brands = Brand::factory(2)->create(['category_id' => $category->id]);

            foreach ($brands as $brand) {
                $vouchers = Voucher::factory(8)->create(['brand_id' => $brand->id]);

                foreach($vouchers as $voucher){
                    Code::factory(10)->create([
                        'voucher_id' => $voucher->id
                    ]);
                }
            }
        }
    }
}
