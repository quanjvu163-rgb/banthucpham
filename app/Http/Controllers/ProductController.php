<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $categories = Category::orderByDesc('ID_DanhMuc')->get();
        $products = Product::orderBy('ID_SanPham')->limit(8)->get();
        $vegeProducts = Product::where('ID_DanhMuc', 1)->orderBy('ID_SanPham')->limit(4)->get();
        $fruProducts = Product::where('ID_DanhMuc', 2)->orderBy('ID_SanPham')->limit(4)->get();
        $meatProducts = Product::where('ID_DanhMuc', 3)->orderBy('ID_SanPham')->limit(4)->get();

        return view('products.index', compact('categories', 'products', 'vegeProducts', 'fruProducts', 'meatProducts'));
    }

    public function action(Request $request)
    {
        $categories = Category::orderByDesc('ID_DanhMuc')->get();
        $title = 'Tất cả sản phẩm';
        $isSearch = $request->filled('tukhoa');
        $query = Product::query();

        if ($request->filled('tukhoa')) {
            $query->where('TenSanPham', 'like', '%' . $request->input('tukhoa') . '%');
        } elseif ($request->filled('id')) {
            $query->where('ID_DanhMuc', $request->input('id'));
        }

        $products = $query->orderByDesc('ID_SanPham')->get();

        return view('products.search', compact('categories', 'products', 'title', 'isSearch'));
    }

    public function show(Request $request)
    {
        $productId = $request->query('id_product', $request->query('id'));
        $product = Product::with(['category', 'supplier'])->findOrFail($productId);
        $comments = Comment::with('member')
            ->where('ID_SanPham', $product->ID_SanPham)
            ->orderBy('ThoiGianBinhLuan')
            ->get();

        return view('products.show', compact('product', 'comments'));
    }

    public function comment(Request $request)
    {
        if ($redirect = $this->requireMember()) {
            return $redirect;
        }

        $productId = $request->query('id_product', $request->query('id'));
        $request->validate([
            'NoiDung' => 'required|string|max:100',
        ]);

        Comment::create([
            'ID_ThanhVien' => session('ID_ThanhVien'),
            'ID_SanPham' => $productId,
            'NoiDung' => $request->input('NoiDung'),
            'ThoiGianBinhLuan' => now(),
        ]);

        return redirect('/sanpham/infoProduct.php?id_product=' . $productId);
    }
}
