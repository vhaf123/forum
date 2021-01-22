<?php

namespace Database\Factories;

use App\Models\Brand;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;

class BrandFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Brand::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->word(20),
            'url_logo' => 'http://forum.test/img/logo/' . $this->faker->randomElement(['logo1.png', 'logo2.png']),
            'category_id' => Category::all()->random()->id,
        ];
    }
}
