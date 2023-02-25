<?php

namespace Database\Factories;

use App\Models\Users;
use Illuminate\Database\Eloquent\Factories\Factory;


class UsersFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Users::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        
        return [
            'email' => $this->faker->email,
            'nom' => $this->faker->text($this->faker->numberBetween(5, 4096)),
            'prénom' => $this->faker->text($this->faker->numberBetween(5, 4096)),
            'actif' => $this->faker->numberBetween(0, 999),
            'date_création' => $this->faker->date('Y-m-d H:i:s'),
            'created_at' => $this->faker->date('Y-m-d H:i:s'),
            'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
