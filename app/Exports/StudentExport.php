<?php

    namespace App\Exports;

    use App\Student;
    use Maatwebsite\Excel\Concerns\FromCollection;
    use Maatwebsite\Excel\Concerns\WithHeadings;
    use App\Classes;
    use App\Section;

    class StudentExport implements FromCollection, WithHeadings
    {

        private $students;

        public function __construct($studArr)
        {
            $this->students = $studArr;

//            dd($studArr);
        }

        public function collection()
        {
            foreach ($this->students as $key => $val)
            {
                $cls = json_decode($val['classes'], 1);
                $section = json_decode($val['sections'], 1);

                $studentCSV[] = [
                    'roll_number' => $val['roll_number'],
                    'student_name' => $val['student_name'],
                    'class' => $cls['class_name'],
                    'section' => $section['section_name'],
                    'father_name' => $val['father_name'],
                    'mother_name' => $val['mother_name'],
                    'gender' => $val['gender'],
                    'dob' => $val['dob'],
                    'address' => $val['address']
                ];
            }      
            return collect($studentCSV);
        }

        public function headings(): array
        {
            return [ 
                'Roll No',
                'Student Name',
                'Class',
                'Section',
                'Fname',
                'Mname',
                'Gender',
                'DOB',
                'Address'
            ];
        }

    }
    