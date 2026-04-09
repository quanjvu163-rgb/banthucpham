<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $member = $this->currentMember();
        $cart = $this->cartData();

        return view('cart.index', [
            'member' => $member,
            'cart' => $cart['cart'],
            'items' => $cart['items'],
            'total' => $cart['total'],
        ]);
    }

    public function add(Request $request)
    {
        if ($redirect = $this->requireMember()) {
            return $redirect;
        }

        $productId = $request->query('id', $request->query('id_product'));
        $product = Product::findOrFail($productId);
        $qty = max(1, (int) $request->input('soluong', 1));

        $cart = session()->get('cart', []);

        if (isset($cart[$product->ID_SanPham])) {
            $cart[$product->ID_SanPham]['qty'] += $qty;
        } else {
            $cart[$product->ID_SanPham] = [
                'ID_SanPham' => $product->ID_SanPham,
                'TenSanPham' => $product->TenSanPham,
                'Img' => $product->Img,
                'GiaBan' => $product->GiaBan,
                'qty' => $qty,
            ];
        }

        session()->put('cart', $cart);

        return redirect('/cart/index.php');
    }

    public function remove(Request $request)
    {
        $productId = $request->query('id_product', $request->query('id'));
        $cart = session()->get('cart', []);
        unset($cart[$productId]);

        if (empty($cart)) {
            session()->forget('cart');
        } else {
            session()->put('cart', $cart);
        }

        return redirect('/cart/index.php');
    }
}
