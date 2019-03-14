@if(Gate::allows('admin-course', $course))
<form method="POST" action="{{ route('courses.enrollments.update', [$course->slug, $enrollment->id]) }}">
  <input type="hidden" name="_method" value="PUT">
  @csrf
  <div class="input-group input-group-sm">
    <select name="role" class="form-control">
      <option value="Candidate" {{ $enrollment->role == 'Candidate' ? 'selected' : '' }}>Candidate</option>
      <option value="Student" {{ $enrollment->role == 'Student' ? 'selected' : '' }}>Student</option>
      <option value="Teacher" {{ $enrollment->role == 'Teacher' ? 'selected' : '' }}>Teacher</option>
    </select>
    <div class="input-group-append">
      <button type="submit" class="btn btn-raised btn-primary px-2"><i class="far fa-save"></i></button>
    </div>
  </div>
</form>
@endif
