<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $table = 'students';
    protected $fillable = ['name','nim','major','class','course_id'];

    public function course(){
        return $this->belongsTo(Courses::class);
    }
}
