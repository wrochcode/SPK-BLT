<div class="mb-2">

  <input type="text" name="kriteria" class="form-control @error('kriteria') is-invalid @enderror"
    value="{{ old('kriteria', $criterias->kriteria) }}" placeholder="the name of the criteria">

  @error('kriteria')
    <span class="invalid-feedback">{{ $message }}</span>
  @enderror
</div>
{{-- <button class="btn btn-primary" type="submit">{{$submit}}</button> --}}
