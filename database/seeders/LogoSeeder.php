<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;

class LogoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brands = Brand::all();

        foreach ($brands as $brand) {
            $brand->update([
                'url_logo' => 'http://forum.test/img/logo/logo_Trasnvip.png'
            ]);
        }
    }
}
