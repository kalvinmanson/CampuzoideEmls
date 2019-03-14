@csrf
<div class="form-group">
  <label for="name" class="bmd-label-floating">Título del tema o pregunta</label>
  <input type="text" id="name" name="name" class="form-control form-control-lg" value="{{ old('name') ? old('name') : $topic->name }}" required>
</div>
<div class="form-group">
  <textarea name="content" class="ckeditor">{{ old('content') ? old('content') : $topic->content }}</textarea>
</div>
<div class="form-group">
  <button type="submit" class="btn btn-raised btn-primary"><i class="far fa-save"></i> Enviar</button>
</div>
@section('scripts')
  <script src="https://cdn.ckeditor.com/4.11.3/basic/ckeditor.js"></script>
@endsection
