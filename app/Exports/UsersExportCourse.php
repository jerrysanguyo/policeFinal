<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class UsersExportCourse implements FromCollection, WithHeadings, WithMapping
{
    protected int $courseId;

    public function __construct(int $courseId)
    {
        $this->courseId = $courseId;
    }
    
    public function collection()
    {
        return User::whereHas('special', function($query) {
                $query->where('admin_course', $this->courseId);
            })
            ->with(['special' => function($query) {
                $query->where('admin_course', $this->courseId)
                    ->with('course', 'training');
            }])
            ->get();
    }
    
    public function map($user): array
    {
        $rows = [];

        foreach ($user->special as $special) {
            $rows[] = [
                ($user->first_name ?? '') . ' ' . ($user->middle_name ?? '') . ' ' . ($user->last_name ?? ''),
                $user->email,
                $user->mobile_number,
                $special->course->name ?? 'N/A',
                $special->training->name ?? 'N/A',
            ];
        }

        return $rows;
    }
    
    public function headings(): array
    {
        return [
            'FULL NAME',
            'EMAIL',
            'MOBILE NUMBER',
            'COURSE',
            'PROGRAM'
        ];
    }
}
