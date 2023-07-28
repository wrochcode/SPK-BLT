<div class="mb-2">
  {{-- value = merupakan default nilai yang terisi --}}
  {{-- <input type="text" name="list" class="form-control @error('list') is-invalid @enderror" value="{{$task->list}}" placeholder="the name of the task"> --}}

  {{-- lebih panjang --}}
  {{-- <input type="text" name="list" class="form-control @error('list') is-invalid @enderror" value="{{old('list') ?? $task->list}}" placeholder="the name of the task"> --}}
  {{-- lebih simpel --}}
  <input type="text" name="list" class="form-control @error('list') is-invalid @enderror"
    value="{{ old('list', $task->list) }}" placeholder="the name of the task">
  @error('list')
    <span class="invalid-feedback">{{ $message }}</span>
  @enderror
</div>
<button class="btn btn-primary" type="submit">{{ $submit }}</button>
