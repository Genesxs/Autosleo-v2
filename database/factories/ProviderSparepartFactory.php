<?php

namespace Database\Factories\Admin\Backend;

use App\Models\Admin\Backend\ProviderSparepart;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProviderSparepartFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProviderSparepart::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'provider_id' => $this->faker->randomDigitNotNull,
        'spare_part_id' => $this->faker->randomDigitNotNull,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
