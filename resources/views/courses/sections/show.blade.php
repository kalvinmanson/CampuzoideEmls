@extends('layouts.app')

@section('content')
@include('courses._header', ['course' => $course])
<div class="row">
  <div class="col-md-8">
    <div class="card">
      <div class="card-header bg-dark text-white">
        @if(Gate::allows('admin-course', $course))
          <a href="{{ route('courses.sections.edit', [$course->slug, $section->slug]) }}" class="btn btn-light float-right"><i class="far fa-edit"></i> Editar</a>
        @endif
        <h1>{{ $section->name }}</h1>
      </div>
      @if($section->video)
        <div class="embed-responsive embed-responsive-16by9">
          <iframe class="embed-responsive-item" src="{{ $section->getVideoEmbedAttribute() }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture;" allowfullscreen></iframe>
        </div>
      @endif
      <div class="card-body">
        {!! $section->content !!}
      </div>
      @if($section->activity)
      <div class="card-header bg-dark text-white">
        <h4>Actividad:</h4>
      </div>
      <div class="card-body">
        {!! $section->activity !!}
      </div>
      @endif
      <div class="card-footer">

      </div>
    </div>
  </div>
  <div class="col-md-4 pl-md-0">
    @include('courses._sidebar', ['course' => $course])
  </div>
</div>
@endsection
