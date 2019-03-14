<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Topic;
use Auth;
use Gate;
use Illuminate\Support\Str;


class CourseTopicController extends Controller
{
    public function index($course)
    {
      $course = Course::where('slug', $course)->firstOrFail();
      $topics = Topic::where('course_id', $course->id)->where('parent_id', 0)->orderBy('updated_at', 'desc')->paginate(20);
      return view('courses.topics.index', compact('course', 'topics'));
    }
    public function create($course)
    {
      $course = Course::where('slug', $course)->firstOrFail();
      if(Gate::denies('use-course', $course)) {
        flash('No puedes acceder a esta area.')->error();
        return redirect()->route('courses.topics.index', $course->slug);
      }
      $topic = new Topic;
      return view('courses.topics.create', compact('course', 'topic'));
    }
    public function store($course, Request $request)
    {
      $course = Course::where('slug', $course)->firstOrFail();
      if(Gate::denies('use-course', $course)) {
        flash('No puedes acceder a esta área.')->error();
        return redirect()->route('courses.topics.index', $course->slug);
      }
      $validatedData = $request->validate([
        'name' => 'required|max:255',
        'content' => 'required|min:50',
      ]);
      $topic = new Topic;
      //if is reply
      $parent = Topic::find($request->parent_id);
      if($parent) {
        $topic->parent_id = $parent->id;
        $parent->touch();
      } else {
        $topic->parent_id = 0;
      }
      $topic->course_id = $course->id;
      $topic->user_id = Auth::user()->id;
      $topic->name = $request->name;
      $topic->slug = Str::slug($request->name, '-').'-'.rand(10000,99999);
      $topic->content = $request->content;
      $topic->save();

      flash('El mensaje ha sido publicado.')->success();
      if($parent) {
        return redirect()->route('courses.topics.show', [$course->slug, $parent->slug]);
      } else {
        return redirect()->route('courses.topics.show', [$course->slug, $topic->slug]);
      }

    }
    public function show($course, $slug)
    {
      $course = Course::where('slug', $course)->firstOrFail();
      $topic = Topic::where('course_id', $course->id)->where('slug', $slug)->firstOrFail();
      return view('courses.topics.show', compact('course', 'topic'));
    }
    public function edit($course, $slug)
    {
        //
    }
    public function update($course, Request $request, $slug)
    {
        //
    }
    public function destroy($id)
    {
        //
    }
}
