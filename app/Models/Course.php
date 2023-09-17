<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $guarded=[];

    protected $table='courses';

    public function GetDepartment()
    {
        return $this->belongsTo(Department::class, 'department','id');
    }

    public function getCourseYear()
    {
        return $this->belongsTo(CourseYear::class, 'course_year','id');
    }


}
