<?php

namespace Database\Factories\Backend;

use App\Models\Backend\SparePart;
use Illuminate\Database\Eloquent\Factories\Factory;

class SparePartFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SparePart::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
        'description' => $this->faker->word,
        'unit_value' => $this->faker->word,
        'image' => $this->faker->word,
        'quantity' => $this->faker->randomDigitNotNull,
        'spare_part_type' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
