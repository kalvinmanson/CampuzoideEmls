@extends('layouts.app')

@section('content')
<div class="py-4">
  <h4 class="m-0">{{ $user->username }}</h4>
  <p class="text-secondary">{{ $user->name }}</p>
  <div class="row">
    <div class="col-md-4 col-lg-3">
      @include('users._pill',['user' => $user])
    </div>
    <div class="col-md-8 col-lg-9">
      <h3>Cursos inscritos</h3>
      <div class="row">
        @foreach($user->enrollments as $enrollment)
          <div class="col-md-4 col-lg-3">
            @include('courses._card', ['course' => $enrollment->course, 'display' => 'pill'])
          </div>
        @endforeach
      </div>
      <hr>
      <h3>Aportes en los foros</h3>
      <ul class="list-group">
        @foreach($user->topics->take(5) as $topic)
          @include('courses.topics._row', ['topic' => $topic])
        @endforeach
      </ul>
    </div>
  </div>
</div>
@endsection
