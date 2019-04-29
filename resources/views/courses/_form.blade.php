@csrf
<div class="form-group">
  <label for="name" class="bmd-label-floating">Nombre del curso</label>
  <input type="text" id="name" name="name" class="form-control" value="{{ old('name') ? old('name') : $course->name }}" required>
</div>
<div class="input-group input-group-sm mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text">{{ route('courses.index') }}/</span>
  </div>
  <input type="text" class="form-control" name="slug" id="slug" value="{{ old('slug') ? old('slug') : $course->slug }}">
</div>
<div class="row">
  <div class="col-md-6">
    <div class="form-group">
      <label for="description" class="bmd-label-floating">Descripción</label>
      <textarea type="text" rows="7" id="description" name="description" class="form-control">{{ old('description') ? old('description') : $course->description }}</textarea>
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group">
      <label for="category" class="bmd-label-floating">Categoría</label>
      <input type="text" id="category" name="category" class="form-control" value="{{ old('category') ? old('category') : $course->category }}">
    </div>
    <div class="form-group">
      <label for="mode" class="bmd-label-floating">Modo del curso</label>
      <select id="mode" name="mode" class="form-control">
        <option value="Open" {{ $course->mode == "Open" ? 'selected' : '' }}>Open</option>
        <option value="Private" {{ $course->mode == "Private" ? 'selected' : '' }}>Private</option>
      </select>
    </div>
    <div class="form-group">
      <label for="picture" class="bmd-label-floating">Banner promocional</label>
      <input type="file" id="picture" name="picture" class="form-control">
      @if($course->picture)
        <a href="/storage/{{ $course->picture }}" data-fancybox class="btn btn-sm"><i class="far fa-image"></i> {{ $course->picture }}</a>
      @endif
    </div>
    <div class="form-group">
      <label for="icon" class="bmd-label-floating">Icono</label>
      <input type="file" id="icon" name="icon" class="form-control">
      @if($course->icon)
        <a href="/storage/{{ $course->icon }}" data-fancybox class="btn btn-sm"><i class="far fa-image"></i> {{ $course->icon }}</a>
      @endif
    </div>
    <div class="form-group">
      <label for="color" class="bmd-label-floating">Color</label>
      <input type="color" name="color" class="" value="{{ old('color') ? old('color') : $course->color }}">
    </div>
  </div>
</div>
<div class="form-group">
  <button type="submit" class="btn btn-raised btn-primary"><i class="far fa-save"></i> Guardar</button>
</div>
