@extends('layouts.app')

@section('content')
<div class="container py-4">
  <h4 class="m-0">Nuevo curso</h4>
  <p class="text-secondary">Completa los datos del nuevo curso.</p>
</div>
<div class="container">
  <form method="POST" action="{{ route('courses.store') }}" enctype="multipart/form-data">
    @include('courses._form', ['course' => $course])
  </form>
</div>
@endsection
