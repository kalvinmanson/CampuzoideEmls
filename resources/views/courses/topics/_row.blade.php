<li class="list-group-item">
  <span class="float-right text-secondary">
    <i class="far fa-star"></i> {{ $topic->rank }}
    <i class="fab fa-replyd"></i> {{ $topic->replies->count() }}
  </span>
  <a href="{{ route('courses.topics.show', [$topic->course->slug, $topic->slug]) }}">
    <strong>{{ $topic->name }}</strong>
  </a>
  <br>
  <small class="text-secondary">
    {{ $topic->created_at->diffForHumans() }} Por
    <a href="{{ route('users.show', $topic->user->username) }}">
      {{ $topic->user->name }}
    </a> En: <a href="{{ route('courses.show', [$topic->course->slug]) }}">
      {{ $topic->course->name }}
    </a>
  </small>
</li>
