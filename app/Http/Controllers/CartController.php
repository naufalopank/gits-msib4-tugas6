<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id)
    {
        $cart = Cart::where('id_produk', $id)->first();
        // dd($cart);
        // $cart = DB::table('cart')->where('id_produk', $id);
        if ($cart) {
            $cart->kuantitas += 1;
            $cart->update();
        } else {
            Cart::create([
                'id_produk' => $id,
            ]);
        }

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
        // dd($cart);
        if ($cart->kuantitas > 1) {
            $cart->kuantitas -= 1;
            $cart->update();
        } else {
            $cart->delete();
        }

        return redirect('/');
    }
}
