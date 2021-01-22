<?php

namespace Database\Factories;

use App\Models\Code;
use Illuminate\Database\Eloquent\Factories\Factory;

class CodeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Code::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'value' => $this->generarCodigo(10)
        ];
    }

    function generarCodigo($longitud) {
        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
        return substr(str_shuffle($permitted_chars), 0, $longitud);
    }
}
