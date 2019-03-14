@extends('layouts.app')

@section('content')
<div class="container py-4">
  <h4 class="m-0">Editar sección: {{ $section->name }}</h4>
  <p class="text-secondary">Completa los datos de la sección del curso.</p>
</div>
<div class="container">
  <form method="POST" action="{{ route('courses.sections.update', [$course->slug, $section->slug]) }}" enctype="multipart/form-data">
    <input type="hidden" name="_method" value="PUT">
    @include('courses.sections._form', ['course' => $course, 'section' => $section])
  </form>
</div>
@endsection
