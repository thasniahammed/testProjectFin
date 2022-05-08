<?php

namespace App\Http\Controllers;

use App\Models\StudentMark;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Term;
use App\Models\Teacher;

class StudentMarkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        try {

            $marks = StudentMark::with('term','students')->latest()->paginate(5);
            return view('studentmark.index',compact('marks'))
            ->with('i', (request()->input('page', 1) - 1) * 5);

        } catch (\Exception $e) {

            return redirect()->route('studentmark.index')
                        ->with('fails',$e);
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $terms = Term::all();
        $students = Student::all();
        return view('studentmark.create',compact('terms','students'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required',
            'term_id' => 'required',
            'history' => 'required',
            'maths' => 'required',
            'science' => 'required',

        ]);
      //Checking duplication
      $data=StudentMark::where('student_id',$request->get('student_id'))
      ->where('term_id',$request->get('term_id'))->first();
      if(!$data){

        StudentMark::create([

            'student_id' => $request->get('student_id'),
            'term_id' => $request->get('term_id'),
            'history' => $request->get('history'),
            'maths' => $request->get('maths'),
            'science' => $request->get('science'),
            'total_marks' => $request->get('history')+$request->get('maths')+$request->get('science'),
        ]);
       
        return redirect()->route('studentmark.index')
                        ->with('success','Student Mark created successfully.');
      }else{
        return redirect()->route('studentmark.index')
        ->with('success','Already added');
      }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Marklist  $marklist
     * @return \Illuminate\Http\Response
     */
    public function show(StudentMark $studentmark)
    {
        return view('studentmark.show',compact('studentmark'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Marklist  $marklist
     * @return \Illuminate\Http\Response
     */
    public function edit(StudentMark $studentmark)
    {
        
        $terms = Term::all();
        $students = Student::all();
        return view('studentmark.edit',compact('terms','students','studentmark'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Marklist  $marklist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StudentMark $studentmark)
    {
        $request->validate([
            'student_id' => 'required',
            'term_id' => 'required',
            'history' => 'required',
            'maths' => 'required',
            'science' => 'required',

        ]);
        //Checking duplication
   

        $data=[

            'student_id' => $request->get('student_id'),
            'term_id' => $request->get('term_id'),
            'history' => $request->get('history'),
            'maths' => $request->get('maths'),
            'science' => $request->get('science'),
            'total_marks' => $request->get('history')+$request->get('maths')+$request->get('science'),
      ];
      
        $studentmark->update($data);
      
        return redirect()->route('studentmark.index')
                        ->with('success','mark updated successfully');
      
     
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Marklist  $marklist
     * @return \Illuminate\Http\Response
     */
    public function destroy(StudentMark $studentmark)
    {
        $studentmark->delete();
       
        return redirect()->route('studentmark.index')
                        ->with('success','Mark deleted successfully');
    }
}
