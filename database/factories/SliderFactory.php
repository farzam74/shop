<?php

namespace Database\Factories;

use App\Models\Slider;
use Illuminate\Database\Eloquent\Factories\Factory;

class SliderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Slider::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

            'image' => $this->faker->image('public/storage/sliders',720,360,null,false),
            'alt' => $this->faker->word(),
            'link' => $this->faker->url()

        ];
    }
}
