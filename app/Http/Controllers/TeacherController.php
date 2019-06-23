<?php

namespace App\Http\Controllers;

use App\Teacher;
use Illuminate\Http\Request;
use DataTables;

class TeacherController extends Controller
{

    public $layout = 'application';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $teachers = Teacher::latest()->get();
            return Datatables::of($teachers)
                ->editColumn('birth_date', function ($row) {
                    return date('d/m/Y', strtotime($row->birth_date));
                })
                ->addColumn('actions', function($row){
                    $edit_rel = route('teachers.edit', $row->id);
                    $edit = '<span class="inline"><a href="'.$edit_rel.'" class="btn btn-primary edit"><i class="fas fa-pen fa-sm"></i></a></span>';

                    $delete_rel = route('teachers.destroy', $row->id);
                    $delete = '<span class="inline"><form action="'.$delete_rel.'" method="POST" onsubmit="Teacher.delete(this, event);">';
                        $delete .= '<input type="hidden" name="_method" value="DELETE">';
                        $delete .= '<input type="hidden" name="_token" value="'.csrf_token().'">';
                        $delete .= '<button class="btn btn-danger" type="submit"><i class="fas fa-trash fa-sm"></i></button>';
                    $delete .= '</form></span>';

                    return $edit . $delete;
                })
                ->rawColumns(['actions'])
                ->make(true);
        }else{
            $teachers = Teacher::all();
            return  view('teacher.index', compact('teachers'));
        } 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teacher = new Teacher();
        return view('teacher.create',  compact('teacher'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $teacher = new Teacher([
            'name' => $request->get('name'),
            'birth_date' => parent::date_to_db($request->get('birth_date')),
        ]);

        $teacher->save();

        return redirect('/teachers')->with('alert', ['type' => 'success', 'msg' => 'Saved successfully!']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit(Teacher $teacher)
    {
        return view('teacher.edit', compact('teacher'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Teacher $teacher)
    {
        $teacher->name = $request->get('name');
        $teacher->birth_date = parent::date_to_db($request->get('birth_date'));
        $teacher->save();

        return redirect('/teachers')->with('alert', ['type' => 'success', 'msg' => 'Updated successfully!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teacher $teacher)
    {
        $teacher->delete();
        return redirect('/teachers')->with('alert', ['type' => 'warning', 'msg' => 'Deleted successfully!']);
    }
}
