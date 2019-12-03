<?php

    namespace App\Http\Controllers;

    use App\Attendance;
    use Illuminate\Http\Request;
    use App\Classes;
    use App\Section;
    use App\Student;
    use DB;

    class AttendanceController extends Controller
    {

        public function index()
        {
            $attendances = Attendance::with('students', 'sections', 'classes')->paginate(5);
            return view('admin.attendance-list', compact('attendances'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
        }

        public function create()
        {
            $arr_class = Classes::all();
            $arr_section = Section::all();
            $arr_student = Student::all();
            return view('admin.attendance-add', compact('arr_class', 'arr_section', 'arr_student'));
        }

        public function store(Request $request)
        {
            $student = $request->get('student');

            $data = array();
            foreach ($student as $key => $value)
            {
                $data[] = [
                    'class_id' => $request->get('class'),
                    'section_id' => $request->get('section'),
                    'attendance_date' => $request->get('attendance_date'),
                    'status' => $value[1],
                    'student_id' => $value[0],
                ];
            }
            Attendance::insert($data);
            return redirect()->route('attendances.index')
                    ->with('success', 'Attendance created successfully');
        }

        public function edit(Attendance $attendance)
        {
            //
        }

        public function update(Request $request, Attendance $attendance)
        {
            //
        }

        public function destroy(Attendance $attendance)
        {
            //
        }

        public function getStudents($cid, $sid)
        {
            $students = DB::table("students")
                ->where("class_id", $cid)
                ->where("section_id", $sid)
                ->pluck("student_name", "id");
            return response()->json($students);
        }

        public function show()
        {
            
        }

    }
    