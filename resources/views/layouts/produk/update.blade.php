@extends('layouts.app')

@section('title', 'Buat Kategori')

@section('content')
    <div class="container mt-4">
        <a href="{{ url('/') }}" data-toggle="tooltip" data-placement="top" title="Kembali"><svg
                xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-arrow-return-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5z" />
            </svg></a>

        <h1 class="my-4">Tambah Produk</h1>
        <form action="{{ url('produk/update') . '/' . $produk->id}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="mb-3">
                <label for="nama_produk" class="form-label">Nama Produk</label>
                <input type="text" class="form-control @error('nama_produk') is-invalid @enderror" name="nama_produk"
                    id="nama_produk" aria-describedby="nama_produkHelp" value="{{ $produk->nama_produk }}">
                @error('nama_produk')
                    <div id="namaprodukHelp" class="form-text">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="kategori" class="form-label">Kategori</label>
                <select class="form-select" class="form-control @error('kategori') is-invalid @enderror" name="kategori"
                    id="kategori" aria-label="Default select example">
                    @foreach ($kategori as $kategori)
                        @if ($kategori->id == $produk->id_kategori)
                            <option selected value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                        @else
                            <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                        @endif
                    @endforeach
                </select>
                @error('kategori')
                    <div id="namaprodukHelp" class="form-text">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="harga" class="form-label">Harga</label>
                <input type="text" class="form-control @error('harga') is-invalid @enderror" name="harga"
                    id="harga" aria-describedby="hargaHelp" value="{{ $produk->harga }}">
                @error('harga')
                    <div id="namaprodukHelp" class="form-text">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi Produk</label>
                <input type="text" class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi"
                    id="deskripsi" aria-describedby="deskripsiHelp" value="{{ $produk->deskripsi }}">
                @error('deskripsi')
                    <div id="namaprodukHelp" class="form-text">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="foto" class="form-label">Foto produk</label>
                <input type="file" accept="image/*" class="form-control @error('foto') is-invalid @enderror"
                    name="foto" id="foto" aria-describedby="fotoHelp" onchange="PreviewImage()"
                    value="{{ asset('produk/' . $produk->foto) }}">
                <img id="preview" class="img-preview" />
                <div class="centered">Preview Gambar</div>
                @error('foto')
                    <div id="namaprodukHelp" class="form-text">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>

@endsection
