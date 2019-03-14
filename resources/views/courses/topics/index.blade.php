@extends('layouts.app')

@section('content')
@include('courses._header', ['course' => $course])
<div class="row">
  <div class="col-md-8">
    @if(Gate::allows('use-course', $course))
      <a href="{{ route('courses.topics.create', $course->slug) }}" class="btn btn-primary"><i class="fas fa-plus"></i> Nuevo tema</a>
    @endif
    <ul class="list-group">
      @foreach($topics as $topic)
      <li class="list-group-item">
        <span class="float-right text-secondary">
          <i class="far fa-star"></i> {{ $topic->rank }}
          <i class="fab fa-replyd"></i> {{ $topic->replies->count() }}
        </span>
        <a href="{{ route('courses.topics.show', [$course->slug, $topic->slug]) }}">
          {{ $topic->name }}
        </a>
        <br>
        <small class="text-secondary">
          {{ $topic->created_at->diffForHumans() }} Por
          <a href="{{ route('users.show', $topic->user->username) }}">
            {{ $topic->user->name }}
          </a>
        </small>
      </li>
      @endforeach
    </ul>
  </div>
  <div class="col-md-4">
    @include('courses._sidebar', ['course' => $course])
  </div>
</div>
@endsection
