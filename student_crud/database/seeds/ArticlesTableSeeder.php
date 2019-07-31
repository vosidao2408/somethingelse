<?php

use Illuminate\Database\Seeder;
use App\Category;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $categories = Category::pluck('id')->toArray();
        
        foreach (range(1, 20) as $index) {
            $categoryIdRand = $categories[array_rand($categories)];
            DB::table('articles')->insert([
                'title' => $title =  $faker->sentence($nbWords = rand(5, 9), $variableNbWords = true),
                'slug' => str_replace(' ','-',$title),
                'content' => $faker->randomHtml(2, 5),
                'address' => $faker->address,
                'contact' => $faker->randomNumber($nbDigits = NULL, $strict = false),
                'status' => 'Con Trong',
                'image_path' => $faker->image($dir = null, $width = 640, $height = 480, 'cats', false),
                'id_category'=>$categoryIdRand    
            ]);
        }
    }
}
