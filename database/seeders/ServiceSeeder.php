<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('services')->insert([
            [
                'name' => 'DỊCH VỤ',
                'parent_id' => '0',
                'title' => 'DỊCH VỤ',
                'description' => 'Với vai trò là chuyên gia thương hiệu BS Media có thể giúp bạn',
            ],
            [
                'name' => 'GÓI DỊCH VỤ',
                'parent_id' => '0',
                'title' => 'GÓI DỊCH VỤ',
                'description' => 'Các gói dịch vụ hiện tại BsMedia phục vụ.',
            ],
            [
                'name' => 'TƯ VẤN THƯƠNG HIỆU',
                'parent_id' => '0',
                'title' => 'TƯ VẤN THƯƠNG HIỆU',
                'description' => '
                    <li>Tư vấn dịch vụ hosting</li>
                    <li> Tư vấn dịch vụ tên miền</li>
                    <li>Tư vấn website phù hợp với ngành nghề</li>
                    <li>Tư vấn website chuẩn seo</li>
                    <li>Thiết kế website</li>',
            ],
            [
                'name' => 'THIẾT KẾ THƯƠNG HIỆU',
                'parent_id' => '0',
                'title' => 'THIẾT KẾ THƯƠNG HIỆU',
                'description' => '
                    <li>Thiết kế nhận diện thương hiệu</li>
                    <li>Đặt tên thương hiệu</li>
                    <li>Thiết kế logo</li>
                    <li>Sáng tạo slogan</li>',
            ],
            [
                'name' => 'THIẾT KẾ MARKETING',
                'parent_id' => '0',
                'title' => 'THIẾT KẾ MARKETING',
                'description' => '
                    <li>Thiết kế profile công ty</li>
                    <li>Thiết kế brochure</li>
                    <li>Thiết kế catalogue</li>
                    <li>Thiết kế bao bì sản phẩm</li>',
            ],
            [
                'name' => 'DỊCH VỤ KHÁC',
                'parent_id' => '0',
                'title' => 'DỊCH VỤ KHÁC',
                'description' => '
                    <li>Truyền thông thương hiệu</li>
                    <li>Tư vấn làm mới thương hiệu</li>
                    <li>In ấn và sản xuất sản phẩm</li>',
            ],
        ]);

    }
}
