<?php
namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('categories')->delete();

        \App\Models\Category::create([
            'id'   => 1,
            'name' => 'Fashion',
            'slug' => 'fashion',
        ]);

        \App\Models\Category::create([
            'id'   => 2,
            'name' => 'Teknologi',
            'slug' => 'teknologi',
        ]);

    }
}
