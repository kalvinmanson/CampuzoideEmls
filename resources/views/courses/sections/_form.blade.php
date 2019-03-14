@csrf
<div class="row">
  <div class="col-md-10">
    <div class="form-group">
      <label for="name" class="bmd-label-floating">Nombre de la sección</label>
      <input type="text" id="name" name="name" class="form-control form-control-lg" value="{{ old('name') ? old('name') : $section->name }}" required>
    </div>
  </div>
  <div class="col-md-2">
    <div class="form-group">
      <label for="sorted" class="bmd-label-floating">Orden</label>
      <input type="number" id="sorted" name="sorted" class="form-control form-control-lg" value="{{ old('sorted') ? old('sorted') : $section->sorted }}" required>
    </div>
  </div>
</div>
<div class="input-group input-group-sm mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text">{{ route('courses.sections.index', $course->slug) }}/</span>
  </div>
  <input type="text" class="form-control" name="slug" id="slug" value="{{ old('slug') ? old('slug') : $section->slug }}">
</div>
<div class="form-group">
  <label for="video" class="bmd-label-floating">Video</label>
  <input type="text" id="video" name="video" class="form-control" value="{{ old('video') ? old('video') : $section->video }}">
</div>
<div class="form-group">
  <label for="content">Contenido</label>
  <textarea name="content" class="ckeditor">{{ old('content') ? old('content') : $section->content }}</textarea>
</div>
<div class="form-group">
  <label for="activity">Actividad</label>
  <textarea name="activity" class="ckeditor">{{ old('activity') ? old('activity') : $section->activity }}</textarea>
</div>
<div class="form-group">
  <button type="submit" class="btn btn-raised btn-primary"><i class="far fa-save"></i> Guardar</button>
</div>
@section('scripts')
  <script src="https://cdn.ckeditor.com/4.11.3/standard-all/ckeditor.js"></script>
@endsection
