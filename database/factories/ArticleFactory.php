<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Article::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->words(3, true);
        $paragraphs = $this->faker->paragraphs(4);
        $paragraph = '';

        foreach ($paragraphs as $para) {
            $paragraph .= '<p>' . $para . '</p>';
        }

        
        return [
            'title' =>  $title,
            'slug' => Str::slug($title),
            'content' => $paragraph,
            'user_id' => User::inRandomOrder()->first()->id,
            'category_id' => Category::inRandomOrder()->first()->id,
            'published_at' => $this->faker->dateTime(),
        ];
    }
}
