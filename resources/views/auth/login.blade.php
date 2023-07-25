<!DOCTYPE html>
<html lang="en">
<x-app-layout>
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">Login Your Account</div>
                    <div class="card-body">
                        <form action="{{route('login')}}" method="post">
                            {{-- penting @csrf utuk membuat form action --}}
                            @csrf
                            <div class="mb-4">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" value="{{old('email')}}" name="email" id="email" class="form-control">
                                @error('email')
                                <div class="text-danger mt-2">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="password" class="form-label">password</label>
                                <input type="password" name="password" id="password" class="form-control">
                                @error('password')
                                <div class="text-danger mt-2">{{$message}}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
