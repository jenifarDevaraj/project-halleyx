<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
class AndroidTopicsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $topics = [
            ['order_no' => 1, 'name' => 'Introduction to Android & Android Studio', 'course_id' => 11],
            ['order_no' => 2, 'name' => 'Installing Android Studio & SDKs', 'course_id' => 11],
            ['order_no' => 3, 'name' => 'Android Project Structure & Files Overview', 'course_id' => 11],
            ['order_no' => 4, 'name' => 'Creating Your First Android App', 'course_id' => 11],
            ['order_no' => 5, 'name' => 'Understanding Activities and Lifecycle', 'course_id' => 11],
            ['order_no' => 6, 'name' => 'Working with XML Layouts', 'course_id' => 11],
            ['order_no' => 7, 'name' => 'Using Buttons, TextView, EditText and ImageView', 'course_id' => 11],
            ['order_no' => 8, 'name' => 'Event Handling and Intents', 'course_id' => 11],
            ['order_no' => 9, 'name' => 'RecyclerView and ListView', 'course_id' => 11],
            ['order_no' => 10, 'name' => 'Fragments in Android', 'course_id' => 11],
            ['order_no' => 11, 'name' => 'Toast, Snackbar, Dialog and AlertDialog', 'course_id' => 11],
            ['order_no' => 12, 'name' => 'SharedPreferences and Internal Storage', 'course_id' => 11],
            ['order_no' => 13, 'name' => 'SQLite Database in Android', 'course_id' => 11],
            ['order_no' => 14, 'name' => 'Permissions and Runtime Permission Handling', 'course_id' => 11],
            ['order_no' => 15, 'name' => 'Working with Media: Audio, Video, and Images', 'course_id' => 11],
            ['order_no' => 16, 'name' => 'Connecting to REST APIs using Retrofit', 'course_id' => 11],
            ['order_no' => 17, 'name' => 'JSON Parsing and Display', 'course_id' => 11],
            ['order_no' => 18, 'name' => 'Firebase Integration (Authentication & Database)', 'course_id' => 11],
            ['order_no' => 19, 'name' => 'Publishing App on Google Play Store', 'course_id' => 11],
            ['order_no' => 20, 'name' => 'Mini Project: Android Notes App with SQLite', 'course_id' => 11],
        ];

        DB::table('course_topics')->insert($topics);

    }
}
