<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentMark extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_id', 'term_id','history','maths','science','total_marks'
    ];
    public function  term()
    {
        return $this->hasOne(Term::class, 'id', 'term_id');
    }
    public function  students()
    {
        return $this->hasOne(Student::class, 'id', 'student_id');
    }
}
