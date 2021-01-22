<?php

namespace Database\Factories;

use App\Models\Voucher;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Brand;
use Illuminate\Support\Carbon;

class VoucherFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Voucher::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'brand_id' => Brand::all()->random()->id,
            'registration_date' => Carbon::createFromFormat( 'd/m/Y', '18/01/2021'),
            'expiration_date' => Carbon::createFromFormat( 'd/m/Y', '18/02/2021'),
            'title' => $this->faker->sentence(4),
            'description' => $this->faker->text(300),
            'text_button' => 'Ver beneficio',
            'image' => 'voucher/' . $this->faker->image('public/storage/voucher', 640, 480, null, false),
        ];
    }
}
