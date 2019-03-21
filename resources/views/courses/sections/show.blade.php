@extends('layouts.app')

@section('content')
@include('courses._header', ['course' => $course])
<div class="row">
  <div class="col-md-8">
    <div class="card">
      <div class="card-header">
        @if(Gate::allows('admin-course', $course))
          <a href="{{ route('courses.sections.edit', [$course->slug, $section->slug]) }}" class="btn float-right"><i class="far fa-edit"></i> Editar</a>
        @endif
        <h1>{{ $section->name }}</h1>
      </div>
      <div class="d-md-flex">
        @if($section->video)
          <div class="flex-fill">
            <div class="embed-responsive embed-responsive-16by9">
              <iframe class="embed-responsive-item" src="{{ $section->getVideoEmbedAttribute() }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture;" allowfullscreen></iframe>
            </div>
          </div>
        @endif
        @if($section->activity)
          <div class="flex-fill">
            <div class="p-2">
              <h4>Actividad:</h4>
              {!! $section->activity !!}
            </div>
          </div>
        @endif
      </div>
      <div class="card-body">
        {!! $section->content !!}
      </div>
      <div class="card-footer">

      </div>
    </div>
  </div>
  <div class="col-md-4 pl-md-0">
    @include('courses._sidebar', ['course' => $course])
  </div>
</div>
@endsection
