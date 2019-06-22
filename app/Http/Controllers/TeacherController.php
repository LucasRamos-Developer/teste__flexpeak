<?php

namespace App\Http\Controllers;

use App\Teacher;
use Illuminate\Http\Request;

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
        $teacher = new Teacher();
        $data = Teacher::all();

        return  view('teacher.index', compact('data', 'teacher'));
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
     * Display the specified resource.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher)
    {
        //
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
