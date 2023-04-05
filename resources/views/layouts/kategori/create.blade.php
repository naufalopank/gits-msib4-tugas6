@extends('layouts.app')

@section('title', 'Buat Kategori')

@section('content')
    <div class="container mt-4">
        <a href="{{ url('kategori') }}" data-toggle="tooltip" data-placement="top" title="Kembali"><svg
                xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-arrow-return-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5z" />
            </svg></a>

        <h1 class="my-4">Tambah Data</h1>
        <form action="{{ url('kategori/store') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="nama_kategori" class="form-label">Nama Kategori</label>
                <input type="text" class="form-control @error('nama_kategori') is-invalid @enderror" name="nama_kategori" id="nama_kategori"
                    aria-describedby="nama_kategoriHelp">
                @error('nama_kategori')
                    <div id="namaKategoriHelp" class="form-text">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
    
@endsection
