<?php

namespace App\Http\Controllers;

use App\Student;
use App\Course;
use App\Teacher;
use Illuminate\Http\Request;
use DataTables;
use PDF;


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $students = Student::latest()->get();
            return Datatables::of($students)
                ->editColumn('birth_date', function ($row) {
                    return date('d/m/Y', strtotime($row->birth_date));
                })
                ->editColumn('course_id', function ($row) {
                    return $row->course->name;
                })
                ->addColumn('teacher_id', function($row){
                    return $row->course->teacher->name;
                })
                ->addColumn('actions', function($row){
                    $edit_rel = route('students.edit', $row->id);
                    $edit = '<span class="inline"><a href="'.$edit_rel.'" class="btn btn-primary edit"><i class="fas fa-pen fa-sm"></i></a></span>';

                    $delete_rel = route('students.destroy', $row->id);
                    $delete = '<span class="inline"><form action="'.$delete_rel.'" method="POST" onsubmit="Course.delete(this, event);">';
                        $delete .= '<input type="hidden" name="_method" value="DELETE">';
                        $delete .= '<input type="hidden" name="_token" value="'.csrf_token().'">';
                        $delete .= '<button class="btn btn-danger" type="submit"><i class="fas fa-trash fa-sm"></i></button>';
                    $delete .= '</form></span>';

                    return $edit . $delete;
                })
                ->rawColumns(['actions', 'teacher_id'])
                ->make(true);
        }else{
            $students = Student::all();
            return  view('student.index', compact('students'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $student = new Student();
        $courses = Course::pluck('name', 'id')->toArray();
        return view('student.create',  array('courses' => $courses, 'student' => $student));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $student = new Student([
            'name' => $request->get('name'),
            'birth_date' => parent::date_to_db($request->get('birth_date')),
            'address_street' => $request->get('address_street'),
            'address_number' => $request->get('address_number'),
            'address_neighborhood' => $request->get('address_neighborhood'),
            'address_city' => $request->get('address_city'),
            'address_state' => $request->get('address_state'),
            'address_zipcode' => $request->get('address_zipcode'),
            'course_id' => $request->get('course_id')
        ]);

        $student->save();

        return redirect('/students')->with('alert', ['type' => 'success', 'msg' => 'Saved successfully!']);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        $courses = Course::pluck('name', 'id')->toArray();
        return view('student.edit',  array('student' => $student, 'courses' => $courses));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $student->name = $request->get('name');
        $student->birth_date = parent::date_to_db($request->get('birth_date'));
        $student->address_street = $request->get('address_street');
        $student->address_number = $request->get('address_number');
        $student->address_neighborhood = $request->get('address_neighborhood');
        $student->address_city = $request->get('address_city');
        $student->address_state = $request->get('address_state');
        $student->address_zipcode = $request->get('address_zipcode');
        $student->course_id = $request->get('course_id');

        $student->save();

        return redirect('/students')->with('alert', ['type' => 'success', 'msg' => 'Updated successfully!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect('/students')->with('alert', ['type' => 'warning', 'msg' => 'Deleted successfully!']);
    }

    /**
     * Generator Report.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function report() {
        $students = Student::get();

        $pdf = \PDF::loadView('student.report', compact('students'))->setPaper('a4', 'landscape');

        return $pdf->stream();  
    }
}
