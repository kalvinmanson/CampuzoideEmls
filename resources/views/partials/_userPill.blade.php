<div class="bg-white">
  <img src="{{ $user->avatar ?? '/storage/users/user.jpg' }}" class="float-left w-25 mr-md-3">
  <div class="pt-3">
    <a href="{{ route('users.show', $user->username) }}">
      <h6 class="m-0">{{ $user->name }}</h6>
    </a>
    <p class="text-secondary">
      <i class="far fa-star"></i> {{ $user->rank }} <small>Registrado {{ $user->created_at->diffForHumans() }}</small>
    </p>
  </div>
  <div class="clearfix"> </div>
</div>
