<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payload['produk'] = Produk::with('kategori')->get();
        $payload['cart'] = Cart::with('produk')->get();

        return view('layouts.produk.index', $payload);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $payload['kategori'] = Kategori::all();
        return view('layouts.produk.create', $payload);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required',
            'kategori' => 'required',
            'harga' => 'required|numeric',
            'deskripsi' => 'required',
            'foto' => 'required|mimes:jpg,jpeg,png|max:2048'
        ]);
        // dd($request->toArray());

        $imgUrl = time() . '-' .$request->nama_produk . '.' . $request->foto->extension();

        $request->foto->move(public_path('produk'), $imgUrl);

        Produk::create([
            'nama_produk' => $request->input('nama_produk'),
            'id_kategori' => $request->input('kategori'),
            'harga' => $request->input('harga'),
            'deskripsi' => $request->input('deskripsi'),
            'foto' => $imgUrl,
        ]);
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $payload['produk'] = Produk::with('kategori')->find($id);
        $payload['kategori'] = Kategori::all();
        // dd($payload['produk']->toArray());

        return view('layouts.produk.update', $payload);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_produk' => 'required',
            'kategori' => 'required',
            'harga' => 'required|numeric',
            'deskripsi' => 'required',
            'foto' => 'required|mimes:jpg,jpeg,png|max:2048'
        ]);
        // dd($request->toArray());

        $imgUrl = time() . '-' .$request->nama_produk . '.' . $request->foto->extension();

        $request->foto->move(public_path('produk'), $imgUrl);

        Produk::where('id', $id)->update([
            'nama_produk' => $request->input('nama_produk'),
            'id_kategori' => $request->input('kategori'),
            'harga' => $request->input('harga'),
            'deskripsi' => $request->input('deskripsi'),
            'foto' => $imgUrl,
        ]);
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cart = Cart::where('id_produk', $id)->first();
        if ($cart) {
            $cart->delete();
        }
        $produk = Produk::find($id);
        $produk->delete();

        return redirect('/');
    }
}
