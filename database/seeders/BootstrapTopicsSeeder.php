<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
class BootstrapTopicsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $topics = [
            ['order_no' => 1, 'name' => 'Bootstrap 5 Introduction', 'course_id' => 5],
            ['order_no' => 2, 'name' => 'How to Include Bootstrap (CDN and Local)', 'course_id' => 5],
            ['order_no' => 3, 'name' => 'Bootstrap Grid System (Containers, Rows, Columns)', 'course_id' => 5],
            ['order_no' => 4, 'name' => 'Responsive Breakpoints', 'course_id' => 5],
            ['order_no' => 5, 'name' => 'Typography and Text Utilities', 'course_id' => 5],
            ['order_no' => 6, 'name' => 'Colors and Background Utilities', 'course_id' => 5],
            ['order_no' => 7, 'name' => 'Spacing Utilities (Margin and Padding)', 'course_id' => 5],
            ['order_no' => 8, 'name' => 'Buttons and Button Groups', 'course_id' => 5],
            ['order_no' => 9, 'name' => 'Forms and Form Controls', 'course_id' => 5],
            ['order_no' => 10, 'name' => 'Tables and Responsive Tables', 'course_id' => 5],
            ['order_no' => 11, 'name' => 'Images and Figures', 'course_id' => 5],
            ['order_no' => 12, 'name' => 'Alerts, Badges, and Progress Bars', 'course_id' => 5],
            ['order_no' => 13, 'name' => 'Cards and Layout Components', 'course_id' => 5],
            ['order_no' => 14, 'name' => 'Navs, Navbars, and Dropdowns', 'course_id' => 5],
            ['order_no' => 15, 'name' => 'Modal, Tooltip, Popover', 'course_id' => 5],
            ['order_no' => 16, 'name' => 'Carousel and Collapse', 'course_id' => 5],
            ['order_no' => 17, 'name' => 'Offcanvas and Accordion', 'course_id' => 5],
            ['order_no' => 18, 'name' => 'Bootstrap Icons', 'course_id' => 5],
            ['order_no' => 19, 'name' => 'Helper Classes and Utility API', 'course_id' => 5],
            ['order_no' => 20, 'name' => 'Creating Responsive Layouts with Bootstrap', 'course_id' => 5],
        ];

        DB::table('course_topics')->insert($topics);

    }
}
