@extends('layouts.login.index')

@section('title', 'Home')

@section('content')
<div class="col-md-12 col-lg-8">
    <div class="card login-box-container">
        <div class="card-body">
            <div class="authent-text">
                <p>Masukkan Akun Anda</p>
            </div>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Username -->
                <div class="mb-3">
                    <div class="form-floating">
                        <input type="text" class="form-control @error('username') is-invalid @enderror"
                               id="floatingInput" name="username" placeholder="Masukkan Username"
                               value="{{ old('username') }}" required>
                        <label for="floatingInput">Masukkan Username</label>
                    </div>
                    @error('username')
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <div class="form-floating">
                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                               id="floatingPassword" name="password" placeholder="Password" required>
                        <label for="floatingPassword">Password</label>
                    </div>
                    @error('password')
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div class="d-grid">
                    <button type="submit" class="btn btn-info m-b-xs">Sign In</button>
                </div>
            </form>

            <!-- Success Message -->
            @if(session('status'))
                <div class="alert alert-success mt-3">
                    {{ session('status') }}
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
