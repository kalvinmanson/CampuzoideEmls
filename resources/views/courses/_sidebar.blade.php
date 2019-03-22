<div class="card">
  <div class="card-header">Temas en el foro</div>
  <ul class="list-group list-group-flush">
  @if($course->topics->count() > 0)
    @foreach($course->topics->take(5) as $topic)
      <li class="list-group-item">
        <a href="{{ $topic->parent ? route('courses.topics.show', [$course->slug, $topic->parent->slug]) : route('courses.topics.show', [$course->slug, $topic->slug]) }}">
          {{ $topic->name }}
        </a><br>
        <small class="text-secondary">
          {{ $topic->created_at->diffForHumans() }} Por
          <a href="{{ route('users.show', $topic->user->username) }}">
            {{ $topic->user->name }}
          </a>
        </small>
      </li>
    @endforeach
  </ul>
  @else
    <p class="text-center py-2">
      No hay temas en este foro por ahora.<br>Sé el primero en aportar o preguntar algo <br>
      <a href="{{ route('courses.topics.create', $course->slug) }}" class="btn btn-primary"><i class="fas fa-plus"></i> Nuevo tema</a>
    </p>
  @endif
</div>
