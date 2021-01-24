<?php

namespace Database\Seeders;

use App\Imports\BrandImport;
use Maatwebsite\Excel\Facades\Excel;

use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Excel::import(new BrandImport, 'GENERADOS_DD/FORUM_CUPON_20210108.csv', 'ftp');
    }
}
