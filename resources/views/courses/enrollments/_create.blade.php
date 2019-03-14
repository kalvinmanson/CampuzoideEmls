@if(Auth::check() && $course->enrollments->where('user_id', Auth::user()->id)->first())
  <li class="nav-item ml-auto">
    <a class="nav-link"><i class="fas fa-medal"></i> {{ $course->enrollments->where('user_id', Auth::user()->id)->first()->growth }}</a>
  </li>
@else
<li class="nav-item ml-auto">
  <a class="nav-link bg-primary text-white" href="#" onclick="event.preventDefault(); document.getElementById('subscribe-form').submit();"><i class="far fa-clipboard"></i> SUSCRIBIRME</a>
</li>
<form id="subscribe-form" method="POST" action="{{ route('courses.enrollments.store', $course->slug) }}" class="d-none">
  @csrf
</form>
@endif
