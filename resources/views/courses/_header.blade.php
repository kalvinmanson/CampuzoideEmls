<div style="background-color: {{ $course->color }}">
  <div class="row">
    <div class="col-md-6">
      <div class="bg-white p-2">
        <a href="{{ route('courses.show', $course->slug) }}" title="Curso: {{ $course->name }}" class="float-left m-0 mr-md-3" style="max-width: 80px;">
          <img src="/storage/{{ $course->icon ?? 'courses/icon.png' }}" class="img-fluid">
        </a>
        <h4 class="m-0">{{ $course->name }}</h4>
        <p class="text-secondary m-0">{{ $course->description }}</p>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>
  <ul class="nav bg-light">
    @if(Auth::check() && Auth::user()->role == "Admin")
    <li class="nav-item"><a class="nav-link" href="{{ route('courses.edit', $course->slug) }}"><i class="far fa-edit"></i> Editar</a></li>
    @endif
    <li class="nav-item"><a class="nav-link" href="{{ route('courses.show', $course->slug) }}">CURSO</a></li>
    <li class="nav-item"><a class="nav-link" href="{{ route('courses.topics.index', $course->slug) }}">FORO</a></li>
    <li class="nav-item"><a class="nav-link" href="{{ route('courses.enrollments.index', $course->slug) }}">MIEMBROS</a></li>
    @include('courses.enrollments._create', ['course' => $course])
  </ul>
</div>
