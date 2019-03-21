<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Enrollment;
use Auth;
use Gate;

class CourseEnrollmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($course)
    {
      $course = Course::where('slug', $course)->firstOrFail();
      $enrollments = Enrollment::where('course_id', $course->id)->get();
      return view('courses.enrollments.index', compact('course', 'enrollments'));
    }
    public function store($course, Request $request)
    {
      $course = Course::where('slug', $course)->firstOrFail();
      if(!Auth::check()) {
        flash('Debes ingresar o registrarte antes de suscribirte.')->warning();
        return redirect()->route('login');
      } elseif($course->enrollments->where('user_id', Auth::user()->id)->first()) {
        flash('Ya estas suscrito a este curso.')->warning();
        return redirect()->route('courses.show', $course->slug);
      } elseif($course->candidates->where('user_id', Auth::user()->id)->first()) {
        flash('Debes esperar a que un moderador o administrador apruebe tu suscripción.')->warning();
        return redirect()->route('courses.show', $course->slug);
      } else {
        $enrollment = new Enrollment;
        $enrollment->course_id = $course->id;
        $enrollment->user_id = Auth::user()->id;
        $enrollment->role = 'Candidate';
        $enrollment->save();
        flash('Ya estas suscrito a este curso, un administrador debera aprobar tu suscripción antes de poder participar.')->success();
        return redirect()->route('courses.show', $course->slug);
      }
    }

    public function update($course, Request $request, $id)
    {
      $course = Course::where('slug', $course)->firstOrFail();
      if(Gate::allows('admin-course', $course)) {
        $enrollment = Enrollment::where('course_id', $course->id)->where('id', $id)->firstOrFail();
        $enrollment->role = $request->role;
        $enrollment->save();
        flash('La suscripción se ha actualizado.')->success();
      }
      return redirect()->route('courses.enrollments.index', $course->slug);
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
    }
}
