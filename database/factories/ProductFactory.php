<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'fa_title' => $this->faker->words(),
            'en_title' => $this->faker->randomElements(["product {$this->faker->randomNumber()} title"]),
            'description' => $this->faker->realText(),
            'price' => $this->faker->numberBetween(1000,100000000),
            'discount' => $this->faker->randomNumber(),
            'rate' => 0,
            'view_counter' => 0,
            'status' => 'موجود',


        ];
    }
}
