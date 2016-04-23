<?php

namespace College;

use Illuminate\Database\Eloquent\Model;

class ExamResult extends Model
{
    public function student()
    {
        return $this->hasOne(User::class, 'id', 'student_id');
    }
}
