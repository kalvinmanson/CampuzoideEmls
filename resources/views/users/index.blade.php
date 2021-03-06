@extends('layouts.app')

@section('content')
<div class="py-4">
  <h4 class="m-0">Usuarios</h4>
  <p class="text-secondary">Estos son nuestros estudiantes destacados.</p>

  <div class="card-columns">
    @foreach($users as $user)
      @include('users._pill',['user' => $user])
    @endforeach
  </div>
</div>
@endsection
