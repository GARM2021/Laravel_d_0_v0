<?php

namespace Database\Factories;

use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\Factory;

class ImageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Image::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $fileName = $this->faker->numberBetween(1, 10) . '.jpg'; // ! C54
        return [
            'path' =>   "img/products/{$fileName}",
        ];
    }

    public function user() //! C54
    {
        $fileName = $this->faker->numberBetween(1, 10) . '.jpg'; // ! C54
        return $this->state([
            'path' =>   "img/products/{$fileName}",
        ]);    
        }
    }