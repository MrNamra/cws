@extends('layouts.app')
@section('main')
    <div class="card" style="margin: 5em">
        <div class="card-body">
            <h5 class="card-title">Login</h5>
            <h6 class="card-subtitle mb-2 text-muted">Admin Login Form</h6>
            <form class="px-4 py-3" method="POST" action="{{url('login')}}">
                @csrf
                <div class="form-group">
                    <label for="exampleDropdownFormEmail1">Email address</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="email@example.com">
                    @error('email')
                    <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleDropdownFormPassword1">Password</label>
                    <input type="password" class="form-control" name="password" id="Password" placeholder="Password">
                    @error('password')
                        <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="dropdownCheck">
                        <label class="form-check-label" for="dropdownCheck">
                            Remember me
                        </label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Sign in</button>
            </form>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">New around here? Sign up</a>
            {{-- <a class="dropdown-item" href="#">Forgot password?</a> --}}
        </div>
    </div>
@endsection
