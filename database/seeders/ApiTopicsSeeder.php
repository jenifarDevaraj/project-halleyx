<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
class ApiTopicsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $topics = [
            ['order_no' => 1, 'name' => 'What is an API? Basics and Real-life Examples', 'course_id' => 10],
            ['order_no' => 2, 'name' => 'Types of APIs: REST, SOAP, GraphQL', 'course_id' => 10],
            ['order_no' => 3, 'name' => 'HTTP Methods: GET, POST, PUT, PATCH, DELETE', 'course_id' => 10],
            ['order_no' => 4, 'name' => 'Understanding API URL, Endpoint, and Parameters', 'course_id' => 10],
            ['order_no' => 5, 'name' => 'Headers and Status Codes in API', 'course_id' => 10],
            ['order_no' => 6, 'name' => 'JSON & XML Data Format in APIs', 'course_id' => 10],
            ['order_no' => 7, 'name' => 'Postman Tool for Testing APIs', 'course_id' => 10],
            ['order_no' => 8, 'name' => 'Create Basic API in PHP or Laravel', 'course_id' => 10],
            ['order_no' => 9, 'name' => 'API Authentication: API Key, Token, Passport', 'course_id' => 10],
            ['order_no' => 10, 'name' => 'Using Middleware in API Projects', 'course_id' => 10],
            ['order_no' => 11, 'name' => 'CRUD API Development', 'course_id' => 10],
            ['order_no' => 12, 'name' => 'Validation in API Requests', 'course_id' => 10],
            ['order_no' => 13, 'name' => 'Consuming APIs using JavaScript or jQuery', 'course_id' => 10],
            ['order_no' => 14, 'name' => 'Rate Limiting and Throttling', 'course_id' => 10],
            ['order_no' => 15, 'name' => 'Pagination and Filtering in APIs', 'course_id' => 10],
            ['order_no' => 16, 'name' => 'API Resource and Transformers (Laravel)', 'course_id' => 10],
            ['order_no' => 17, 'name' => 'Error Handling in APIs', 'course_id' => 10],
            ['order_no' => 18, 'name' => 'Working with External APIs (e.g., Weather, Payment)', 'course_id' => 10],
            ['order_no' => 19, 'name' => 'Securing Your API (CORS, HTTPS, Tokens)', 'course_id' => 10],
            ['order_no' => 20, 'name' => 'Building a Complete RESTful API Project', 'course_id' => 10],
        ];

        DB::table('course_topics')->insert($topics);

    }
}
