@extends('layouts.app')

@section('content')
@include('courses._header', ['course' => $course])
<div class="row">
  <div class="col-md-8">
    <div class="card">
      @if($section->activity)
      <div class="card-header bg-dark text-white">
        <h4>Actividad:</h4>
      </div>
      <div class="card-body">
        {!! $section->activity !!}
      </div>
      @endif
      <div class="card-footer">
        
      </div>
    </div>
  </div>
  <div class="col-md-4 pl-md-0">
    @include('courses._sidebar', ['course' => $course])
  </div>
</div>
@endsection
