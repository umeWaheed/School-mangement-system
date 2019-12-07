<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classe;
use App\Section;
use App\Teacher;

class ClassesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
		$classes = Classe::all();
		return view('classes.index',compact('classes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //passing the sections to the view
		$sections =  Section::all();
		$teachers = Teacher::all();
		return view('classes.create', compact('sections','teachers'));
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
		Classe::create([
		'name'=>$request->input('name'),
		'section_id'=>$request->input('section'),
		'teacher_id'=>$request->input('teacher')
		]);
        return redirect()->route('classes.index')->with(['message' => 'Class added successfully']);
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
		$classe = Classe::findOrFail($id);
		$sections =  Section::all();
		$teachers = Teacher::all();
		return view('classes.edit', compact('classe','sections','teachers'));
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
		$class = Classe::findOrFail($id);
        $class->update($request->all());
        return redirect()->route('classes.index')->with(['message' => 'Class updated successfully']);
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
		$class = Classe::findOrFail($id);
        $class->delete();
        return redirect()->route('classes.index')->with(['message' => 'Class deleted successfully']);
    }
}
