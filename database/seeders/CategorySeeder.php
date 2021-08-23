<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'name' => 'Thiết kế',
                'slug' => 'thiet-ke',
                'parent_id' => 0,
                'link' => 'laravel.com',
                'image' => 'thietke',
                'status' => 1
            ],
            [
                'name' => 'Thiết kế website',
                'slug' => 'thiet-ke-website',
                'parent_id' => 0,
                'link' => 'laravel.com',
                'image' => 'thietke',
                'status' => 1
            ],
            [
                'name' => 'Marketing Online',
                'slug' => 'marketing-online',
                'parent_id' => 0,
                'link' => 'laravel.com',
                'image' => 'thietke',
                'status' => 1
            ],
            [
                'name' => 'Thiết kế thương hiệu',
                'slug' => 'thiet-ke-thuong-hieu',
                'parent_id' => 1,
                'link' => 'laravel.com',
                'image' => 'thietke',
                'status' => 1
            ],
            [
                'name' => 'Kiến thức website',
                'slug' => 'kien-thuc-website',
                'parent_id' => 2,
                'link' => 'laravel.com',
                'image' => 'thietke',
                'status' => 1
            ],
        ]);
    }
}
