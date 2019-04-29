<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use Auth;
use Storage;
use Image;

class CourseController extends Controller
{
  public function index()
  {
    $courses = Course::where('site_id', insite()->id)->paginate(30);
    return view('courses.index', compact('courses'));
  }
  public function create()
  {
    //isAdmin
    if(!Auth::check() || Auth::user()->role != "Admin") {
      flash('No tienes acceso.')->error();
      return redirect()->route('courses.index');
    }
    $course = new Course;
    return view('courses.create', compact('course'));
  }
  public function store(Request $request)
  {
    //isAdmin
    if(!Auth::check() || Auth::user()->role != "Admin") {
      flash('No tienes acceso.')->error();
      return redirect()->route('courses.index');
    }
    $validatedData = $request->validate([
      'name' => 'required|max:255',
      'slug' => 'required|unique:courses|max:255'
    ]);
    $course = new Course;
    $course->site_id = insite()->id;
    $course->name = $request->name;
    $course->slug = $request->slug;
    $course->category = $request->category;
    $course->description = $request->description;
    $course->color = $request->color;
    $course->mode = $request->mode;
    //Load picture
    if($request->hasFile('picture') && $request->file('picture')->isValid()) {
      $filename = 'courses/'.$course->slug.'-'.$course->id.'.png';
      $img = Image::make($request->file('picture'))->fit(600, 300)->encode('png');
      Storage::put('public/'.$filename, $img->stream());
      $course->picture = $filename;
    }
    //Load icon
    if($request->hasFile('icon') && $request->file('icon')->isValid()) {
      $filename = 'courses/icon-'.$course->slug.'-'.$course->id.'.png';
      $img = Image::make($request->file('icon'))->fit(250, 250)->encode('png');
      Storage::put('public/'.$filename, $img->stream());
      $course->icon = $filename;
    }
    $course->save();

    flash('El curso se ha creado.')->success();
    return redirect()->route('courses.show', $course->slug);
  }
  public function show($slug)
  {
      $course = Course::where('slug', $slug)->firstOrFail();
      return view('courses.show', compact('course'));
  }
  public function edit($slug)
  {
    //isAdmin
    if(!Auth::check() || Auth::user()->role != "Admin") {
      flash('No tienes acceso.')->error();
      return redirect()->route('courses.index');
    }
    $course = Course::where('slug', $slug)->firstOrFail();
    return view('courses.edit', compact('course'));
  }
  public function update(Request $request, $slug)
  {
    //isAdmin
    if(!Auth::check() || Auth::user()->role != "Admin") {
      flash('No tienes acceso.')->error();
      return redirect()->route('courses.index');
    }
    $course = Course::where('slug', $slug)->firstOrFail();
    $validatedData = $request->validate([
      'name' => 'required|max:255',
      'slug' => 'required|unique:courses,slug,'.$course->id.'|max:255',
      'picture' => 'image',
      'icon' => 'image'
    ]);
    $course->name = $request->name;
    $course->slug = $request->slug;
    $course->category = $request->category;
    $course->description = $request->description;
    $course->color = $request->color;
    $course->mode = $request->mode;
    //Load picture
    if($request->hasFile('picture') && $request->file('picture')->isValid()) {
      $filename = 'courses/'.$course->slug.'-'.$course->id.'.png';
      $img = Image::make($request->file('picture'))->fit(600, 300)->encode('png');
      Storage::put('public/'.$filename, $img->stream());
      $course->picture = $filename;
    }
    //Load icon
    if($request->hasFile('icon') && $request->file('icon')->isValid()) {
      $filename = 'courses/icon-'.$course->slug.'-'.$course->id.'.png';
      $img = Image::make($request->file('icon'))->fit(250, 250)->encode('png');
      Storage::put('public/'.$filename, $img->stream());
      $course->icon = $filename;
    }
    $course->save();

    flash('El curso se ha actualizado.')->success();
    return redirect()->route('courses.show', $course->slug);
  }
  public function destroy($id)
  {
    //isAdmin
    if(!Auth::check() || Auth::user()->role != "Admin") {
      flash('No tienes acceso.')->error();
      return redirect()->route('courses.index');
    }
  }
}
