<?php

namespace App\Http\Controllers;

use App\Teacher;
use App\Course;
use Illuminate\Http\Request;
use DataTables;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $courses = Course::latest()->get();
            return Datatables::of($courses)
                
                ->editColumn('teacher_id', function ($row) {
                    return $row->teacher->name;
                })
                ->addColumn('actions', function($row){
                    $edit_rel = route('courses.edit', $row->id);
                    $edit = '<span class="inline"><a href="'.$edit_rel.'" class="btn btn-primary edit"><i class="fas fa-pen fa-sm"></i></a></span>';

                    $delete_rel = route('courses.destroy', $row->id);
                    $delete = '<span class="inline"><form action="'.$delete_rel.'" method="POST" onsubmit="Course.delete(this, event);">';
                        $delete .= '<input type="hidden" name="_method" value="DELETE">';
                        $delete .= '<input type="hidden" name="_token" value="'.csrf_token().'">';
                        $delete .= '<button class="btn btn-danger" type="submit"><i class="fas fa-trash fa-sm"></i></button>';
                    $delete .= '</form></span>';

                    return $edit . $delete;
                })
                ->rawColumns(['actions'])
                ->make(true);
        }else{
            $courses = Course::all();
            return  view('course.index', compact('data'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $course = new Course();
        $teachers = Teacher::pluck('name', 'id')->toArray();
        return view('course.create',  array('teachers' => $teachers, 'course' => $course));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $course = new Course([
            'name' => $request->get('name'),
            'teacher_id' => $request->get('teacher_id')
        ]);

        $course->save();

        return redirect('/courses')->with('alert', ['type' => 'success', 'msg' => 'Saved successfully!']);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        return view('course.edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        $course->name = $request->get('name');
        $course->teacher_id = $request->get('teacher_id');

        $course->save();

        return redirect('/courses')->with('alert', ['type' => 'success', 'msg' => 'Updated successfully!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        $course->delete();
        return redirect('/courses')->with('alert', ['type' => 'warning', 'msg' => 'Deleted successfully!']);
    }
}
