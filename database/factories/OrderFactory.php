<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
    'invoice_number' => 'FAC-' . $this->faker->unique()->numberBetween(1000, 9999),
    'customer_number' => 'CUST-' . $this->faker->numberBetween(100, 500),
    'status' => $this->faker->randomElement(['ordered', 'in_process', 'in_route', 'delivered']),
    'process_name' => 'Revisión técnica',
    'is_active' => true,
];
    }
}
