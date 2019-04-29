@extends('layouts.app')

@section('content')
<div class="container py-4">
  <h4 class="m-0">Editar sitio: {{ $site->name }}</h4>
  <p class="text-secondary">Actualizar informacion del sitio.</p>
</div>
<div class="container">
  <form method="POST" action="{{ route('sites.update', $site->id) }}" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="_method" value="PUT">
    <div class="form-group">
      <label for="name">Nombre del sitio</label>
      <input type="text" name="name" id="name" class="form-control" value="{{ $site->name }}" required>
    </div>
    <div class="form-group">
      <label for="tagline">Tagline</label>
      <input type="text" name="tagline" id="tagline" class="form-control" value="{{ $site->tagline }}" required>
    </div>
    <div class="form-group">
      <label for="logo" class="bmd-label-floating">Logo</label>
      <input type="file" id="logo" name="logo" class="form-control">
      @if($site->logo)
        <a href="/storage/{{ $site->logo }}" data-fancybox class="btn btn-sm"><i class="far fa-image"></i> {{ $site->logo }}</a>
      @endif
    </div>
    <div class="form-group">
      <label for="head">Meta Head</label>
      <textarea name="head" class="form-control">{{ old('head') ? old('head') : $site->head }}</textarea>
    </div>
    <div class="form-group">
      <label for="footer">Footer</label>
      <textarea name="footer" class="ckeditor">{{ old('footer') ? old('footer') : $site->footer }}</textarea>
    </div>
    <div class="form-group">
      <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
  </form>
</div>
@endsection
@section('scripts')
  <script src="https://cdn.ckeditor.com/4.11.3/standard-all/ckeditor.js"></script>
@endsection
