<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Instructor>
 */
class InstructorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->name;
        $slug = Str::slug($name);
        return [
            'name' => $name,
            'slug' => $slug,
            'nickname' => $this->faker->userName,
            'avatar' => $this->faker->imageUrl('500', '500', 'people'),
            'phone_number' => $this->faker->phoneNumber(),
            'gender' => $this->faker->boolean(),
            'dob' => $this->faker->date(),
            'current_job' => $this->faker->jobTitle,
            'education' => $this->faker->text,
            'bio' => $this->faker->text,
            'user_id' => $this->faker->randomElement(User::pluck('id'))
        ];
    }
}
