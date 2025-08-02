<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
class CakephpTopicsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $topics = [
            ['order_no' => 1, 'name' => 'Introduction to CakePHP and MVC Architecture', 'course_id' => 9],
            ['order_no' => 2, 'name' => 'Installing CakePHP via Composer', 'course_id' => 9],
            ['order_no' => 3, 'name' => 'CakePHP Folder Structure Explained', 'course_id' => 9],
            ['order_no' => 4, 'name' => 'Routing Basics (routes.php)', 'course_id' => 9],
            ['order_no' => 5, 'name' => 'Creating Controllers and Actions', 'course_id' => 9],
            ['order_no' => 6, 'name' => 'Creating Views with CakePHP Templates', 'course_id' => 9],
            ['order_no' => 7, 'name' => 'Layouts and Elements in CakePHP', 'course_id' => 9],
            ['order_no' => 8, 'name' => 'Working with Models and Table Classes', 'course_id' => 9],
            ['order_no' => 9, 'name' => 'Connecting to MySQL and .env Setup', 'course_id' => 9],
            ['order_no' => 10, 'name' => 'Database Migrations with Bake Console', 'course_id' => 9],
            ['order_no' => 11, 'name' => 'Form Helper and Data Validation', 'course_id' => 9],
            ['order_no' => 12, 'name' => 'Flash Messages and Redirects', 'course_id' => 9],
            ['order_no' => 13, 'name' => 'Associations (BelongsTo, HasMany, etc.)', 'course_id' => 9],
            ['order_no' => 14, 'name' => 'Authentication using CakePHP AuthComponent', 'course_id' => 9],
            ['order_no' => 15, 'name' => 'CRUD using Bake Commands', 'course_id' => 9],
            ['order_no' => 16, 'name' => 'Working with Sessions and Cookies', 'course_id' => 9],
            ['order_no' => 17, 'name' => 'Creating REST APIs in CakePHP', 'course_id' => 9],
            ['order_no' => 18, 'name' => 'Middleware and Event System in CakePHP', 'course_id' => 9],
            ['order_no' => 19, 'name' => 'Deploying a CakePHP App on Server', 'course_id' => 9],
            ['order_no' => 20, 'name' => 'Mini Project: Task Manager using CakePHP', 'course_id' => 9],
        ];

        DB::table('course_topics')->insert($topics);

    }
}
