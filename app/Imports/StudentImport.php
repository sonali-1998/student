<?php

    namespace App\Imports;

    use App\Student;
    use Maatwebsite\Excel\Concerns\ToModel;
    use Maatwebsite\Excel\Concerns\WithHeadingRow;
    use App\Classes;
    use App\Section;

    class StudentImport implements ToModel, WithHeadingRow
    {

        public function model(array $row)
        {

            \Log::error('excel', [
                'roll_number' => $row['rollno'],
                'student_name' => $row['name'],
                'class_id' => $this->getClassID($row['class']),
                'section_id' => $this->getSectionID($row['section']),
                'father_name' => $row['fname'],
                'mother_name' => $row['mname'],
                'gender' => $row['gender'],
                'dob' => $row['dob'],
                'address' => $row['address'],
            ]);

            return new Student([
                'roll_number' => $row['rollno'],
                'student_name' => $row['name'],
                'class_id' => $this->getClassID($row['class']),
                'section_id' => $this->getSectionID($row['section']),
                'father_name' => $row['fname'],
                'mother_name' => $row['mname'],
                'gender' => $row['gender'],
                'dob' => $row['dob'],
                'address' => $row['address'],
            ]);
        }

        public function headingRow()
        {
            return 1;
        }

        private function getClassID($className)
        {

            $cId = Classes::where('class_name', $className)->first();
            return $cId['id'];
        }

        private function getSectionID($sectionName)
        {

            $sId = Section::where('section_name', $sectionName)->first();
            return $sId['id'];
        }

    }
    