<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SpecielCourseExtension;

class SpecialCourseExtension extends Seeder
{
    public function run(): void
    {
        $specialExn = [
            1 => [
                'Investigation Officers Basic Course (IOBC)',
                'Criminal Investigation Course (CIC)',
                'PS INVESTIGATION & DETECTION COURSE (PSIDC)',
                'Criminal Investigation and Detective Development Course (CIDDC)',
                'Crime Investigation and Detection Course (CRIDEC)',
                'PS TRAFFIC INVEST COURSE',
                'BOMB TECH. & INVEST. REFRESHER SEMINAR',
                'TRAFFIC ACCIDENT INVESTIGATION COURSE',
                'Specialized Course for Investigation of Crimes Involving Women and Children for PNP-WCPD Officers',
                'Specialized Course for WCPD Officer',
                'Automated Fingerprint Identification System (AFIS)',
                'Crime Scene First Responder Workshop (CSFRW)',
                'Introduction to Cybercrime Investigation Course (ICIC)',
                'Police Detective Course',
                'Investigation Of Crimes Involving Women and Children',
                'Drug Enforcement Course (DEC)',
                'Post Blast Investigation Course',
                'Public Safety Narcotics Investigation Course',
            ],
            2 => [
                'Basic Intelligence Collection and Analysis Seminar (BICAS)',
                'Police Intelligence Officers Course (PIOC)',
                'Police Intelligence Course (PIC)',
                'Intelligence Basic Course (IBC)',
                'Public Safety Basic Intel Officers Course (PSBIOC)',
                'BASIC INTELLIGENCE SEMINAR',
                'TACTICAL INTELLIGENCE COURSE',
                'NAVAL INTELLIGENCE OFFICERS COURSE',
            ],
            3 => [
                'SPECIAL COUNTER INSURGENCY OPERATION UNIT (PNP-SCOUT)',
                'Basic Internal Security Operation Course (BISOC)',
                'Basic Incident Command System (BICS) Seminar',
                'Air to Ground Operations Seminar (AGOS)',
                'SEARCH AND RESCUE COURSES/ TRAINING',
                'BEOD',
                'EORA',
                'SAF Commando',
                'SWAT',
                'POST BLAST',
                'VIP Course',
                'Combat Medic Course',
                'Pistol Instructor and Range Safety Officers Course (PIRSOC)',
                'CQB',
                'Hijacking Course',
                'Tactical Arnis',
                'CDMOs',
            ],
            4 => [
                'Patrol Officers Basic Course (POBC)',
                'Field Training Officers Course (FTOC) for PCO',
                'Field Training Officers Course (FTOC) for PNCO',
                'Field Training Officers Development Course (FTODC)',
                'Basic Logistic Course (BLC)',
                'Logistics Management Course (LMC)',
                'Human Resource Management Staff Course (HRMSC)',
                'Tourist Oriented Police Community Order and Protection (TOPCOP)',
                'Finance Officers Course (FOC)',
                'Training Management Officers Course (TMOC)',
                'Supply Management Seminar',
                'Research and Development Course (RDC)',
                'Finance PNCO Course',
                'Human Resource and Doctrine Development Staff Course (HRDDSC)',
                'Police Human Rights Officers Course (PHROC)',
                'Controllership Officers Course (COC)',
                'Chief of Police Qualification Course (COPQC)',
                'PNP Instructor Development Course (IDC)',
                'Training Management Staff Course (TMSC)',
                'Disposition Of Admin Cases, Policies and Procedures In Handling Admin Case',
                'Seminar-Workshop on Disciplinary and Non-Disciplinary Policy',
                'Tactical Commanders Course (TCC)',
            ],
            5 => [
                'Police Community Affairs and Development Course (PCADC)',
                'TOT-READY (Resistance Education Against Drugs for the Youth)',
                'Revitalized – Pulis Sa Barangay (RPSB)',
                'Retooled Community Service Program (RCSP)',
                'Men Opposed to Violence Against Women Everywhere (MOVE)',
            ],
        ];

        foreach ($specialExn as $category => $courseList) {
            foreach ($courseList as $course) {
                SpecielCourseExtension::create([
                    'special_id'    =>  $category,
                    'name'          =>  $course,
                    'remarks'       =>  'Seeder generated',
                    'created_by'    =>  1,
                    'updated_by'    =>  1,
                ]);
            }
        }
    }
}
