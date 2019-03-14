@extends('layouts.app')

@section('content')
<div class="py-4">
  @if(Auth::check() && Auth::user()->role == "Admin")
  <div class="btn-group  float-right" role="group" aria-label="actions">
    <a href="{{ route('courses.create') }}" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i> Nuevo</a>
  </div>
  @endif
  <h4 class="m-0">Cursos</h4>
  <p class="text-secondary">Descubre los cursos que te ayudara a crecer.</p>
  <div class="card-columns">
    @foreach($courses as $course)
    <div class="card">
      <a href="{{ route('courses.show', $course->slug) }}" title="Curso: {{ $course->name }}">
        <img class="card-img-top" src="/storage/{{ $course->picture ?? 'courses/default.png' }}" alt="{{ $course->name }}">
      </a>
      <div class="card-body">
        <a href="{{ route('courses.show', $course->slug) }}" title="Curso: {{ $course->name }}">
          <h5 class="card-title mb-0">{{ $course->name }}</h5>
        </a>
        <p class="card-text">{!! nl2br($course->description) !!}</p>
      </div>
      <div class="card-footer">
        <ul class="nav">
          <li class="nav-item">
            <a href="{{ route('courses.show', $course->slug) }}" title="Curso: {{ $course->name }}" class="nav-link">Ir al curso</a>
          </li>
          @include('courses.enrollments._create', ['course' => $course])
        </ul>
      </div>
    </div>
    @endforeach
  </div>
</div>
@endsection
