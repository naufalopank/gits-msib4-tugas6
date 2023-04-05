@extends('layouts.app')

@section('title', 'Produk')

@section('content')
    <h1 class="mt-5">Halaman Produk</h1>
    <a href="{{ url('produk/create') }}" class="btn btn-outline-primary my-2"> <svg xmlns="http://www.w3.org/2000/svg"
            width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
            <path
                d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
        </svg>Tambah Produk</a>
    <div class="container">
        <div class="row">
            @foreach ($produk as $produk)
                <div class="col-sm-3">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="{{ asset('produk/' . $produk->foto) }}" alt="" />
                                <h2>Rp. {{ number_format($produk->harga, 2) }}</h2>
                                <p><b>{{ $produk->nama_produk }}</b></p>
                                <a href="{{ url('cart/add') . '/' . $produk->id }}" class="btn btn-default add-to-cart"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-cart" viewBox="0 0 16 16">
                                        <path
                                            d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                    </svg> <b>Add to cart</b>
                                </a>
                            </div>
                            <div class="product-overlay">
                                <div class="overlay-content">
                                    <h2>Rp. {{ number_format($produk->harga, 2) }}</h2>
                                    <p><b>{{ $produk->nama_produk }}</b></p>
                                    <a href="{{ url('cart/add') . '/' . $produk->id }}"
                                        class="btn btn-default add-to-cart"><svg xmlns="http://www.w3.org/2000/svg"
                                            width="16" height="16" fill="currentColor" class="bi bi-cart"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                        </svg> <b>Add to cart</b>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div>
                            <ul class="nav nav-pills nav-justified">
                                <li class="p-1"><a href="{{ url('produk/edit') . '/' . $produk->id }}"
                                        style="text-decoration: none" class="link-warning"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                            <path
                                                d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
                                        </svg> Update
                                    </a>
                                </li>
                                <li class="p-1"><a href="{{ url('produk/destroy') . '/' . $produk->id }}"
                                        style="text-decoration: none" class="link-danger"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                            <path
                                                d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                                        </svg> Delete
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <footer>
        <button class="btn btn-outline-primary btn-floating btn-lg" type="button" data-bs-toggle="offcanvas"
            data-bs-target="#offcanvasBottom" aria-controls="offcanvasBottom" id="btn-back-to-top">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" class="bi bi-cart" viewBox="0 0 16 16">
                <path
                    d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
            </svg>
        </button>
        <div class="offcanvas offcanvas-bottom h-auto" tabindex="-1" id="offcanvasBottom"
            aria-labelledby="offcanvasBottomLabel">
            <div class="offcanvas-header">
                <h2 class="offcanvas-title" id="offcanvasBottomLabel">Cart</h2>
                <div class="btn btn-outline-primary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                        class="bi bi-cart" viewBox="0 0 16 16" style="">
                        <path
                            d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                    </svg> Checkout</div>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <h3 class="offcanvas-body">
                <div class="row">
                    @foreach ($cart as $cart)
                        <div class="col-sm-3 p-2">
                            <div class="card" style="width: 18rem;">
                                <img class="card-img-top" src="{{ asset('produk/' . $cart->produk->foto) }}">
                                <div class="card-body">
                                    <h4 class="card-title">{{ $cart->produk->nama_produk }}</h4>
                                    <h5>{{ $cart->produk->kategori->nama_kategori }}</h5>
                                    <a href="{{ url('cart/destroy') . '/' . $cart->id_produk }}"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-dash-circle" viewBox="0 0 16 16">
                                            <path
                                                d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                            <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z" />
                                        </svg></a>
                                    {{ $cart->kuantitas }}
                                    <a href="{{ url('cart/add') . '/' . $cart->id_produk }}"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                                            <path
                                                d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                            <path
                                                d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                        </svg></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </h3>
        </div>
    </footer>
@endsection
