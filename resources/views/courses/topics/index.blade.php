@extends('layouts.app')

@section('content')
@include('courses._header', ['course' => $course])
<div class="row">
  <div class="col-md-8">
    @if(Gate::allows('use-course', $course))
      <a href="{{ route('courses.topics.create', $course->slug) }}" class="btn btn-primary"><i class="fas fa-plus"></i> Nuevo tema</a>
    @endif
    @if($topics->count() > 0)
      <ul class="list-group">
        @foreach($topics as $topic)
          @include('courses.topics._row', ['topic' => $topic])
        @endforeach
      </ul>
    @else
      <p class="text-center py-2">
        No hay temas en este foro por ahora.<br>Sé el primero en aportar o preguntar algo <br>
        <a href="{{ route('courses.topics.create', $course->slug) }}" class="btn btn-primary"><i class="fas fa-plus"></i> Nuevo tema</a>
      </p>
    @endif

  </div>
  <div class="col-md-4">
    @include('courses._sidebar', ['course' => $course])
  </div>
</div>
@endsection
