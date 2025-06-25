<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use Auth;

class CartController extends Controller
{
    public function index(){
        $cartItems = Cart::with('product')
        ->where('user_id', auth()->id())
        ->get();

        return view('cart', compact('cartItems'));
    }

    public function addToCart(Request $request, $id){
        if (! Auth::check()) {
            // jika belum login, redirect dengan alert

            toast('Silahkan login terlebih dahulu untuk menambahkan ke keranjang', 'erro');
            return redirect('/login');
        }
        $validated = $request->validate([
            'qty' => 'required|integer|min:1',
        ]);

        $cart = Cart::where('user_id', Auth::id())
        ->where('product_id', $id)
        ->first();

        if ($cart) {
            $cart->increment('qty', $request->qty);
        } else {
            Cart::create([
                'user_id' => Auth::id(),
                'product_id' => $id,
                'qty' => $request->qty,
            ]);
        }
        toast('Produk berhasil ditambahkan ke keranjang', 'success');
        return back();
    }

    public function updateCart(Request $request, $id){
        $cartItems = Cart::findOrFail($id);

        $request->validate([
            'qty' => 'required|integer|min:1|max:' . $cartItems->product->stock,
        ]);

        $cartItems->qty = $request->qty;
        $cartItems->save();

        toast('Jumlah berhasil di perbarui', 'success');
        return redirect()->route('cart.index');
    }

    public function remove($id){
        $cart = Cart::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        $cart->delete();

        toast('Product berhasil dihapus dari keranjang.', 'success');
        return redirect()->route('cart.index');
    }

    public function checkout(){
        $cartItems = Cart::with('product')->where('user_id', auth()->id())->get();
        if ($cartItems->isEmpty()) {
            toast('Keranjang kosong. Tidak bisa di checkout', 'warning');
            return redirect()->route('cart.index');
        }

        // hitung total harga
        $total = $cartItems->sum(function ($item) {
            return $item->qty * $item->product->price;
        });

        // simpan order
        $order = Order::create([
            'user_id' => auth()->id(),
            'order_code' => 'ORD-' . strtoupper(Str::random(8)),
            'total_price' => $total,
            'status' => 'pending',
        ]);
    }
}
