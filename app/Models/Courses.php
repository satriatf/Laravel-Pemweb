<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Courses extends Model
{
    use HasFactory;
    protected $table = 'courses';
    protected $fillable = ['name','category','desc'];

    public function student(){
        return $this->belongsTo(Student::class);
    }
}
