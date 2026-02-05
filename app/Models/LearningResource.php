<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LearningResource extends Model
{
    protected $fillable = [
        'title',
        'category',
        'year',
        'description',
        'file_path',
        'url',
        'is_active',
        'order',
        'faculty_id',
        'study_program_id',
        'type',
        'video_url'
    ];

    public function faculty()
    {
        return $this->belongsTo(Faculty::class);
    }

    public function studyProgram()
    {
        return $this->belongsTo(StudyProgram::class);
    }

    public function studentCategory()
    {
        return $this->belongsTo(StudentDocumentCategory::class, 'student_category_id');
    }

    public function learningCategory()
    {
        return $this->belongsTo(LearningDocumentCategory::class, 'learning_category_id');
    }
}
