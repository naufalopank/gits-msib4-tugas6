@extends('layouts.app')

@section('title', 'register')

@section('content')
    <div class="container mt-4">
        <h1 class="my-4">Sign Up</h1>
        <form action="{{ route('do.register') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name"
                    aria-describedby="nameHelp">
                @error('name')
                    <div id="nameHelp" class="form-text">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                    id="email" aria-describedby="emailHelp">
                @error('email')
                    <div id="emailHelp" class="form-text">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                    id="password">
                @error('password')
                    <div id="passwordHelp" class="form-text">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
                    name="password_confirmation" id="password_confirmation">
                @error('password_confirmation')
                    <div id="passwordConfirmationHelp" class="form-text">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="foto" class="form-label">Foto Profile</label>
                <input type="file" accept="image/*" class="form-control @error('foto') is-invalid @enderror"
                    name="foto" id="foto" aria-describedby="fotoHelp" onchange="PreviewImage()">
                <img id="preview" class="img-preview" />
                <div class="centered">Preview Gambar</div>
                @error('foto')
                    <div id="namaprodukHelp" class="form-text">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Register</button>

            <p class="my-3">
                <a href="{{ route('login') }}">Login</a>
                atau
                <a href="{{ route('register') }}">Sign up</a>
            </p>
        </form>
    </div>

@endsection
