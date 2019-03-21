<div class="card">
  <a href="{{ route('courses.show', $course->slug) }}" title="Curso: {{ $course->name }}">
    <img class="card-img-top" src="/storage/{{ $course->picture ?? 'courses/default.png' }}" alt="{{ $course->name }}">
    <div class="text-center position-relative" style="margin-top: -50px;">
      <img src="/storage/{{ $course->icon ?? 'courses/icon.png' }}" class="w-25 rounded-circle" style="border: 4px solid {{ $course->color }}">
    </div>
  </a>
  <div class="card-body">
    <a href="{{ route('courses.show', $course->slug) }}" title="Curso: {{ $course->name }}">
      <h5 class="card-title mb-0">{{ $course->name }}</h5>
    </a>
    @if($display == 'full')
      <p class="card-text">{!! nl2br($course->description) !!}</p>
    @endif
  </div>
  @if($display == 'full')
  <div class="card-footer">
    <ul class="nav">
      <li class="nav-item">
        <a href="{{ route('courses.show', $course->slug) }}" title="Curso: {{ $course->name }}" class="nav-link">Ir al curso</a>
      </li>
      @include('courses.enrollments._create', ['course' => $course])
    </ul>
  </div>
  @endif
</div>
