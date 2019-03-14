<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Section;
use Auth;
use Gate;

class CourseSectionController extends Controller
{
    public function index($course) {
      return redirect()->route('courses.show', $course);
    }
    public function create($course)
    {
      $course = Course::where('slug', $course)->firstOrFail();
      if(Gate::denies('admin-course', $course)) {
        flash('No puedes acceder a esta area.')->error();
        return redirect()->route('courses.show', $course->slug);
      }
      $section = new Section;
      return view('courses.sections.create', compact('course', 'section'));
    }

    public function store($course, Request $request)
    {
      $course = Course::where('slug', $course)->firstOrFail();
      if(Gate::denies('admin-course', $course)) {
        flash('No puedes acceder a esta area.')->error();
        return redirect()->route('courses.show', $course->slug);
      }
      $validatedData = $request->validate([
        'name' => 'required|max:255',
        'slug' => 'required|alpha_num|unique:sections|max:255',
      ]);
      $section = new Section;
      $section->course_id = $course->id;
      $section->user_id = Auth::user()->id;
      $section->name = $request->name;
      $section->slug = $request->slug;
      $section->video = $request->video;
      $section->content = $request->content;
      $section->activity = $request->activity;
      $section->sorted = $request->sorted;
      $section->save();
      flash('Sección creada.')->success();
      return redirect()->route('courses.show', $course->slug);
    }
    public function show($course, $slug)
    {
      $course = Course::where('slug', $course)->firstOrFail();
      $section = Section::where('course_id', $course->id)->where('slug', $slug)->firstOrFail();
      return view('courses.sections.show', compact('course', 'section'));
    }
    public function edit($course, $slug)
    {
      $course = Course::where('slug', $course)->firstOrFail();
      $section = Section::where('course_id', $course->id)->where('slug', $slug)->firstOrFail();
      return view('courses.sections.edit', compact('course', 'section'));
    }
    public function update($course, Request $request, $slug)
    {
      $course = Course::where('slug', $course)->firstOrFail();
      $section = Section::where('course_id', $course->id)->where('slug', $slug)->firstOrFail();
      $validatedData = $request->validate([
        'name' => 'required|max:255',
        'slug' => 'required|alpha_num|unique:sections,slug,'.$section->id.'|max:255',
      ]);
      $section->name = $request->name;
      $section->slug = $request->slug;
      $section->video = $request->video;
      $section->content = $request->content;
      $section->activity = $request->activity;
      $section->sorted = $request->sorted;
      $section->save();
      flash('Sección actualizada.')->success();
      return redirect()->route('courses.show', $course->slug);
    }
    public function destroy($id)
    {
        //
    }
}
