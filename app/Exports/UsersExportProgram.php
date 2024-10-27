<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\{
    Excel\Concerns\FromQuery,
    Excel\Concerns\WithHeadings,
    Excel\Concerns\WithMapping,
};

class UsersExportProgram implements FromQuery, WithHeadings, WithMapping
{
    protected int $programId;

    public function __construct(int $programId)
    {
        $this->programId = $programId;
    }

    public function query()
    {
        return User::query()
            ->whereHas('course', function($query) {
                $query->where('program_id', $this->programId);
            })
            ->with(['course' => function($query) {
                $query->where('program_id', $this->programId)->with('program');
            }, 'information', 'information.rank', 'information.office', 'course_extn.highestTraining']);
    }

    public function map($user): array
    {
        $firstCourse = $user->course->firstWhere('program_id', $this->programId);

        return [
            ($user->first_name ?? '') . ' ' . ($user->middle_name ?? '') . ' ' . ($user->last_name ?? ''),
            $user->email,
            $user->mobile_number,
            $user->information->rank->name,
            $user->information->qlfr,
            $user->information->badge_number,
            $user->information->gender,
            $user->information->birthdate,  
            $user->information->age,
            $user->information->office->name, 
            $user->information->shift,
            $user->information->entered_service,
            $user->information->last_promotion,
            $firstCourse->program->name,
            $firstCourse->class_number,
            $firstCourse->start_date,
            $firstCourse->end_date,
            $firstCourse->ranking,
            $user->course_extn->highestTraining->name,
            $user->course_extn->date_graduation,
            $user->course_extn->order_merit,
            $user->course_extn->ftoc ?? 'N/A',
            $user->course_extn->qe_result,
            $user->course_extn->date_qualifying,
        ];
    }

    public function headings(): array
    {
        return [
            'FULL NAME',
            'EMAIL',
            'MOBILE NUMBER',
            'RANK',
            'QLFR',
            'BADGE NUMBER',
            'GENDER',
            'BIRTHDATE',
            'AGE',
            'OFFICE',
            'SHIFT',
            'DATE OF SERVICE ENTRY',
            'DATE OF LAST PROMOTION',
            'PROGRAM',
            'CLASS NUMBER',
            'START DATE',
            'END DATE',
            'RANKING',
            'HIGHEST TRAINING',
            'DATE OF GRADUATION',
            'ORDER OF MERIT',
            'FTOC',
            'QUALIFICATION EXAM RESULT',
            'DATE OF QUALIFICATION EXAM',
        ];
    }
}
