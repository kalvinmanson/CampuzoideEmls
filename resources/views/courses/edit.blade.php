@extends('layouts.app')

@section('content')
<div class="container py-4">
  <h4 class="m-0">Editar curso: {{ $course->name }}</h4>
  <p class="text-secondary">Completa los datos del nuevo curso.</p>
</div>
<div class="container">
  <form method="POST" action="{{ route('courses.update', $course->slug) }}" enctype="multipart/form-data">
    <input type="hidden" name="_method" value="PUT">
    @include('courses._form', ['course' => $course])
  </form>
</div>
@endsection
