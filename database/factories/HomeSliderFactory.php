<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\HomeSlider>
 */
class HomeSliderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => '<span>I will give you best</span>'.$this->faker->text(30),
            'short_title' => $this->faker->text(200),
            'video_url' => 'https://www.youtube.com/watch?v=FzVR_fymZw4',
            'image' => 'images/no-image.jpg',
        ];
    }
}
