<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Classe;
use App\User;

class StudentsController extends Controller
{
    //
	public function index()
    {
        //
		$classes =  Classe::all();
		$students = Student::all();
		return view('students.index',compact('students','classes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //passing the classes to the view
		$classes =  Classe::all();
		return view('students.create', compact('classes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
		$user = User::create([
			'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
			'type' => User::STUDENT_TYPE
		]);
		Student::create([
		'name'=>$request->input('name'),
		'class_id'=>$request->input('classe'),
		'user_id'=>$user->id
		]);
        return redirect()->route('students.index')->with(['message' => 'Student added successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
		$student = Student::findOrFail($id);
		$classes =  Classe::all();
		return view('students.edit', compact('classes','student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
		$student = Student::findOrFail($id);
        $student->update($request->all());
        return redirect()->route('students.index')->with(['message' => 'Student updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
		$student = Student::findOrFail($id);
		$user = User::findOrFail($student->user_id);
        $student->delete();
		$user->delete();
        return redirect()->route('students.index')->with(['message' => 'Teacher deleted successfully']);
    }
}
