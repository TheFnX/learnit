<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'Coloquio'
        ]);
        
        Category::create([
            'name' => 'Conferencia'
        ]);

        Category::create([
            'name' => 'Congreso'
        ]);
        
        Category::create([
            'name' => 'Convención'
        ]);

        Category::create([
            'name' => 'Foro'
        ]);

        Category::create([
            'name' => 'Seminario'
        ]);
        
        Category::create([
            'name' => 'Simposio'
        ]);

        Category::create([
            'name' => 'Taller'
        ]);

        Category::create([
            'name' => 'Webinar'
        ]);
    }
}
