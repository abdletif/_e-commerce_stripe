<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


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
        $title=$this->faker->sentence(5);

        return [
            'title'        => $title,
            'slug'         => Str::slug($title),
            'subtitle'     => $this->faker->text(100),
            'description'  => $this->faker->text(180),
            'price'        => $this->faker->randomNumber(3),
        ];
    }
}
