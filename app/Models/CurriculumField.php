<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CurriculumField extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',

        'name',
        'job_title',
        'phone',
        'email',
        'location',

        'link_name',
        'link',
        'link_name_2',
        'link_2',
        'link_name_3',
        'link_3',

        'hard_skill_1',
        'hard_skill_2',
        'hard_skill_3',
        'hard_skill_4',
        'hard_skill_5',

        'about',

        'company',
        'position',
        'start_date',
        'end_date',
        'responsibilities',

        'company_2',
        'position_2',
        'start_date_2',
        'end_date_2',
        'responsibilities_2',

        'course_name',
        'education_institution',
        'education_start_year',
        'education_end_year',

        'info_1',
        'info_2',
        'info_3',
        'info_4',
        'info_5',

        'font_size',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}