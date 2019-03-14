@extends('layouts.app')

@section('content')
@include('courses._header', ['course' => $course])
<div class="row">
  <div class="col-md-8">
    <ul class="list-group">
      @foreach($course->sections as $section)
      <a href="{{ route('courses.sections.show', [$course->slug, $section->slug]) }}" class="list-group-item">
        <span class="label mr-2"><i class="far fa-bookmark m-0"></i></span>
        {{ $section->name }}
        <small class="label float-right"><i class="far fa-star p-0 m-0"></i> {{ $section->rank }}</small>
      </a>
      @endforeach
    </ul>
    @if(Gate::allows('admin-course', $course))
      <a href="{{ route('courses.sections.create', $course->slug) }}" class="btn btn-primary"><i class="fas fa-plus"></i> Nueva sección</a>
    @endif
  </div>
  <div class="col-md-4">
    @include('courses._sidebar', ['course' => $course])
  </div>
</div>
@endsection
