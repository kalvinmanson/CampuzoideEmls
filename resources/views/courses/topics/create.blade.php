@extends('layouts.app')

@section('content')
@include('courses._header', ['course' => $course])
<div class="row">
  <div class="col-md-8">
    <form method="POST" action="{{ route('courses.topics.store', ['course' => $course->slug]) }}">
      @include('courses.topics._form', ['course' => $course, 'topic' => $topic])
    </form>
  </div>
  <div class="col-md-4">
    @include('courses._sidebar', ['course' => $course])
  </div>
</div>
@endsection
