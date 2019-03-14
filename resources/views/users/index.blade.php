@extends('layouts.app')

@section('content')
<div class="py-4">
  <h4 class="m-0">Usuarios</h4>
  <p class="text-secondary">Estos son nuestros estudiantes destacados.</p>

  <div class="card-columns">
    @foreach($users as $user)
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">{{ $user->name }}</h5>
        <p class="card-text">{{ $user->rank }}</p>
      </div>
    </div>
    @endforeach
  </div>
</div>
@endsection
