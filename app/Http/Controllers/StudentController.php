<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use App\Student;
    use App\Classes;
    use App\Section;
    use Maatwebsite\Excel\Facades\Excel;
    use App\Imports\StudentImport;
    use App\Exports\StudentExport;
    use Maatwebsite\Excel\ExcelServiceProvider;

    class StudentController extends Controller
    {

        public function index()
        {
            $students = Student::with('sections', 'classes')->paginate(5);
            return view('admin.student-list', compact('students'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
        }

        public function create()
        {
            $arr_class = Classes::all();
            $arr_section = Section::all();
            return view('admin.student-add', compact('arr_class', 'arr_section'));
        }

        public function store(Request $request)
        {
            request()->validate([
                'roll_number' => 'required',
                'student_name' => 'required',
                'father_name' => 'required',
                'mother_name' => 'required',
                'gender' => 'required',
                'class_id' => 'required',
                'section_id' => 'required',
                'gender' => 'required',
                'dob' => 'required',
                'address' => 'required',
            ]);
            Student::create($request->all());
            return redirect()->route('students.index')
                    ->with('success', 'Student created successfully');
        }

        public function edit(Student $student)
        {
            $arr_class = Classes::all();
            $arr_section = Section::all();
            return view('admin.student-edit', compact('student', 'arr_class', 'arr_section'));
        }

        public function update(Request $request, Student $student)
        {
            request()->validate([
                'roll_number' => 'required',
                'student_name' => 'required',
                'father_name' => 'required',
                'mother_name' => 'required',
                'gender' => 'required',
                'class_id' => 'required',
                'section_id' => 'required',
                'gender' => 'required',
                'dob' => 'required',
                'address' => 'required',
            ]);
            $student->update($request->all());
            return redirect()->route('students.index')
                    ->with('success', 'Students updated successfully');
        }

        public function destroy($id)
        {
            Student::destroy($id);
            return redirect()->route('students.index')
                    ->with('success', 'Student deleted successfully');
        }

        public function import()
        {
            return view('admin.multiple-student-add');
        }

        public function bulkUpload(Request $request)
        {

            // validations 
            $path1 = $request->file('student_xls')->store('temp');
            $path = storage_path('app') . '/' . $path1;
            Excel::import(new StudentImport, $path);
            return redirect()->route('students.index')
                    ->with('success', 'Student imported successfully');
        }

        public function export()
        {
            return Excel::download(new StudentExport, 'student_xls.csv');
        }

    }
    