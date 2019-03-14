@csrf
<input type="hidden" name="name" value="Re: {{ $topic->name }}">
<input type="hidden" name="parent_id" value="{{ $topic->id }}">
<div class="form-group">
  <textarea name="content" class="ckeditor">{{ old('content') ? old('content') : '' }}</textarea>
</div>
<div class="form-group">
  <button type="submit" class="btn btn-raised btn-primary"><i class="far fa-save"></i> Enviar</button>
</div>
@section('scripts')
  <script src="https://cdn.ckeditor.com/4.11.3/basic/ckeditor.js"></script>
@endsection
