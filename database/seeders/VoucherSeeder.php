<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Voucher;
use App\Models\Code;

class VoucherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vouchers = Voucher::factory(100)->create();

        foreach ($vouchers as $voucher) {
            Code::factory(5)->create([
                'voucher_id' => $voucher->id
            ]);
        }
    }
}
