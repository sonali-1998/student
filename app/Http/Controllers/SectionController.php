<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use App\Section;

    class SectionController extends Controller
    {

        public function index()
        {
            $sections = Section::latest()->paginate(5);
            return view('admin.section-list', compact('sections'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
        }

        public function create()
        {
            return view('admin.section-add');
        }

        public function store(Request $request)
        {
            request()->validate([
                'section_name' => 'required',
            ]);
            Section::create($request->all());
            return redirect()->route('sections.index')
                    ->with('success', 'Section created successfully');
        }

        public function edit(Section $section)
        {
            return view('admin.section-edit', compact('section'));
        }

        public function update(Request $request, Section $section)
        {
            request()->validate([
                'section_name' => 'required',
            ]);
            $section->update($request->all());
            return redirect()->route('sections.index')
                    ->with('success', 'Section updated successfully');
        }

        public function destroy($id)
        {
            Section::destroy($id);
            return redirect()->route('sections.index')
                    ->with('success', 'Section deleted successfully');
        }

    }
    