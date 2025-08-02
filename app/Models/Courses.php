<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'order_no',
        'status'
    ];
    public function topics()
    {
        return $this->hasMany(CourseTopics::class, 'course_id');
    }
    // public function topicUsers()
    // {
    //     return $this->hasMany(Courses::class, 'course_id');
    // }
}
