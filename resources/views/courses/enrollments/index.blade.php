@extends('layouts.app')

@section('content')
@include('courses._header', ['course' => $course])
<div class="row">
  <div class="col-md-8">
    <div class="row">
      @foreach($course->enrollments as $enrollment)
      <div class="col-md-4 mb-2">
        @include('partials._userPill',['user' => $enrollment->user])
        @include('courses.enrollments._form', ['enrollment' => $enrollment])
      </div>
      @endforeach

      @if(Gate::allows('admin-course', $course))
        @foreach($course->candidates as $candidate)
        <div class="col-md-4 mb-2">
          @include('partials._userPill',['user' => $candidate->user])
          @include('courses.enrollments._form', ['enrollment' => $candidate])
        </div>
        @endforeach
      @endif
    </div>
  </div>
  <div class="col-md-4">
    @include('courses._sidebar', ['course' => $course])
  </div>
</div>
@endsection
