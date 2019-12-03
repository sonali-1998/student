<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use App\Classes;
    use App\Section;

    class ClassController extends Controller
    {

        public function index()
        {  
            $classes = Classes::with('sections')->paginate(5);
            return view('admin.class-list', compact('classes'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
        }

        public function create()
        {
            $arr_section = Section::all();
            return view('admin.class-add', compact('arr_section'));
        }

        public function store(Request $request)
        {
            request()->validate([
                'class_name' => 'required',
            ]);
            Classes::create($request->all());
            return redirect()->route('classes.index')
                    ->with('success', 'Class created successfully');
        }

        public function edit(Classes $class)
        {
            $arr_section = Section::all();
            return view('admin.class-edit', compact('class', 'arr_section'));
        }

        public function update(Request $request, Classes $class)
        {
            request()->validate([
                'class_name' => 'required',
            ]);
            $class->update($request->all());
            return redirect()->route('classes.index')
                    ->with('success', 'Class updated successfully');
        }

        public function destroy($id)
        {
            Classes::destroy($id);
            return redirect()->route('classes.index')
                    ->with('success', 'Class deleted successfully');
        }

    }
    