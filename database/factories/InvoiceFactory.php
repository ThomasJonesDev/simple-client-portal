<?php

namespace Database\Factories;

use App\Models\Invoice;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class InvoiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'invoice_number' => $this->faker->unique()->randomNumber(4),
            'invoice_date' => $this->faker->date(),
            'due_date' => $this->faker->date(),
            'invoice_amount' => $this->faker->randomNumber(4),
            'invoice_status' => $this->faker->randomElement(Invoice::STATUSES),
            'user_id' => '1',
        ];
    }
}
