@extends('layouts.app')

@section('content')
@include('courses._header', ['course' => $course])
<div class="row">
  <div class="col-md-8">
    <div class="card">
      <div class="card-header">
        <h1>{{ $topic->name }}</h1>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-9">
            {!! $topic->content !!}
            <p class="text-secondary">
              <i class="far fa-calendar"></i>
              {{ $topic->created_at->toDayDateTimeString() }},
              {{ $topic->created_at->diffForHumans() }}
            </p>
          </div>
          <div class="col-md-3">
            @include('users._pill',['user' => $topic->user])
          </div>
        </div>
      </div>
      @foreach($topic->replies as $reply)
      <div class="card-body border-top">
        <div class="row">
          <div class="col-md-9">
            {!! $reply->content !!}
            <p class="text-secondary">
              <i class="far fa-calendar"></i>
              {{ $reply->created_at->toDayDateTimeString() }},
              {{ $reply->created_at->diffForHumans() }}
            </p>
          </div>
          <div class="col-md-3">
            @include('users._pill',['user' => $reply->user])
          </div>
        </div>

      </div>
      @endforeach
    </div>

    @if(Gate::allows('use-course', $course))
      <form method="POST" action="{{ route('courses.topics.store', ['course' => $course->slug]) }}">
      @include('courses.topics._reply', ['topic' => $topic])
      </form>
    @endif
  </div>
  <div class="col-md-4">
    @include('courses._sidebar', ['course' => $course])
  </div>
</div>
@endsection
