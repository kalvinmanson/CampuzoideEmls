<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Question;
use Auth;
use Gate;
use Illuminate\Support\Str;

class CourseQuestionController extends Controller
{
    public function index($course) {
      $course = Course::where('slug', $course)->firstOrFail();
      return view('couse.questions.index', compact('course'));
    }
    public function create($course)
    {
      $course = Course::where('slug', $course)->firstOrFail();
      if(Gate::denies('admin-course', $course)) {
        flash('No puedes acceder a esta area.')->error();
        return redirect()->route('courses.show', $course->slug);
      }
      $question = new Question;
      return view('courses.questions.create', compact('course', 'question'));
    }

    public function store($course, Request $request)
    {
      $course = Course::where('slug', $course)->firstOrFail();
      if(Gate::denies('admin-course', $course)) {
        flash('No puedes acceder a esta area.')->error();
        return redirect()->route('courses.show', $course->slug);
      }
      $validatedData = $request->validate([
        'name' => 'required|max:255'
      ]);
      $question = new Question;
      $question->course_id = $course->id;
      $question->user_id = Auth::user()->id;
      $question->name = $request->name;
      $question->slug = Str::slug($request->name, '-').rand(1000,9999);
      $question->video = $request->video;
      $question->content = $request->content;
      $question->activity = $request->activity;
      $question->sorted = $request->sorted;
      $question->save();
      flash('Sección creada.')->success();
      return redirect()->route('courses.show', $course->slug);
    }
    public function show($course, $slug)
    {
      $course = Course::where('slug', $course)->firstOrFail();
      $question = Question::where('course_id', $course->id)->where('slug', $slug)->firstOrFail();
      return view('courses.questions.show', compact('course', 'question'));
    }
    public function edit($course, $slug)
    {
      $course = Course::where('slug', $course)->firstOrFail();
      $question = Question::where('course_id', $course->id)->where('slug', $slug)->firstOrFail();
      return view('courses.questions.edit', compact('course', 'question'));
    }
    public function update($course, Request $request, $slug)
    {
      $course = Course::where('slug', $course)->firstOrFail();
      $question = Question::where('course_id', $course->id)->where('slug', $slug)->firstOrFail();
      $validatedData = $request->validate([
        'name' => 'required|max:255',
        'slug' => 'required|unique:questions,slug,'.$question->id.'|max:255',
      ]);
      $question->name = $request->name;
      $question->slug = $request->slug;
      $question->video = $request->video;
      $question->content = $request->content;
      $question->activity = $request->activity;
      $question->sorted = $request->sorted;
      $question->save();
      flash('Sección actualizada.')->success();
      return redirect()->route('courses.show', $course->slug);
    }
    public function destroy($id)
    {
        //
    }
}
