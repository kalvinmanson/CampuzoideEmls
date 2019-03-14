@extends('layouts.app')

@section('content')
<div class="container py-4">
  <h4 class="m-0">Nueva sección en el curso</h4>
  <p class="text-secondary">Completa los datos de la nueva sección del curso.</p>
</div>
<div class="container">
  <form method="POST" action="{{ route('courses.sections.store', $course->slug) }}" enctype="multipart/form-data">
    @include('courses.sections._form', ['course' => $course, 'section' => $section])
  </form>
</div>
@endsection
