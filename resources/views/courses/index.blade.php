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
      @include('courses._card', ['course' => $course, 'display' => 'full'])
    @endforeach
  </div>
</div>
@endsection
