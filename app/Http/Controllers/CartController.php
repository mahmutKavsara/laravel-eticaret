<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    public function index() {
        $cartItem = session('cart',[]);
        $totalPrice = 0;
        foreach ($cartItem as $cart) {
            $totalPrice += $cart['price'] * $cart['qty'];
        }

        return view('frontend.pages.cart',compact('cartItem','totalPrice'));
    }

    public function add(Request $request) {
        $productID = $request->product_id;
        $qty = $request->qty ?? 1;
        $size = $request->size;

        $product = Product::find($productID);

        if (!$product) {
            return back()->withError('Ürün Bulunamadı!');
        }

        $cartItem = session('cart', []);

        if (array_key_exists($productID, $cartItem)) {
            $cartItem[$productID]['qty'] += $qty;
        } else {
            $cartItem[$productID] = [
                'image' => $product->image,
                'name' => $product->name,
                'price' => $product->price,
                'qty' => $qty,
                'size' => $size,
            ];
        }

        session(['cart' => $cartItem]);

        return back()->withSuccess('Ürün Sepete Eklendi!');
    }

    public function remove(Request $request) {
        $productID = $request->product_id;
        $cartItem = session('cart', []);

        if (array_key_exists($productID, $cartItem)) {
            unset($cartItem[$productID]);
        }

        session(['cart' => $cartItem]);

        return back()->withSuccess('Başarıyla Sepetten Kaldırıldı!');
    }
}
