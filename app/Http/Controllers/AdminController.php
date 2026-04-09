<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use App\Models\Member;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        if ($redirect = $this->requireAdmin()) {
            return $redirect;
        }

        $view = $request->query('view', 'dashboard');
        $payload = ['view' => $view];

        switch ($view) {
            case 'dashboard':
                $payload = array_merge($payload, $this->dashboardData());
                break;

            case 'list-order':
                $payload = array_merge($payload, $this->approvedOrdersData());
                break;

            case 'edit-order':
                $invoice = Invoice::with('member')->findOrFail($request->query('id'));

                if ($request->isMethod('post') && $request->has('submit')) {
                    $validated = $request->validate([
                        'DiaChi' => 'required|string|max:30',
                        'SoDienThoai' => 'required|string|max:10',
                        'GhiChu' => 'nullable|string|max:30',
                        'XuLy' => 'required|integer|in:0,1,2',
                    ]);

                    $invoice->update([
                        'DiaChi' => $validated['DiaChi'],
                        'SoDienThoai' => $validated['SoDienThoai'],
                        'GhiChu' => $validated['GhiChu'] ?? '',
                        'XuLy' => $validated['XuLy'],
                    ]);

                    return redirect('/admin/index.php?view=edit-order&id=' . $invoice->ID_HoaDon);
                }

                $payload['invoice'] = $invoice;
                $payload['items'] = InvoiceItem::where('ID_HoaDon', $invoice->ID_HoaDon)
                    ->orderBy('ID_SanPham')
                    ->get();
                break;

            case 'cat-product':
                if ($request->isMethod('post') && $request->has('add')) {
                    Category::create([
                        'TenDanhMuc' => $request->input('name'),
                        'Mota' => $request->input('Mota'),
                    ]);

                    return redirect('/admin/index.php?view=cat-product');
                }

                $payload['categories'] = Category::orderByDesc('ID_DanhMuc')->get();
                break;

            case 'list-post':
                $payload['suppliers'] = Supplier::orderByDesc('ID_NCC')->get();
                break;

            case 'add-post':
                if ($request->isMethod('post') && $request->has('submit')) {
                    Supplier::create([
                        'TenNCC' => $request->input('TenNCC'),
                        'Email' => $request->input('Email'),
                        'SoDienThoai' => $request->input('SoDienThoai'),
                        'DiaChi' => $request->input('DiaChi'),
                        'Img' => $request->input('Img'),
                    ]);

                    return redirect('/admin/index.php?view=list-post');
                }
                break;

            case 'add-product':
                if ($request->isMethod('post') && $request->has('submit')) {
                    Product::create([
                        'ID_DanhMuc' => $request->input('danhmuc'),
                        'ID_NhaCungCap' => $request->input('nhacungcap'),
                        'TenSanPham' => $request->input('TenSanPham'),
                        'MoTa' => $request->input('MoTa'),
                        'GiaBan' => $request->input('GiaBan'),
                        'SoLuong' => $request->input('SoLuong'),
                        'Img' => $request->input('Img'),
                        'BanChay' => 'ko',
                    ]);

                    return redirect('/admin/index.php?view=list-product');
                }

                $payload['categories'] = Category::orderByDesc('ID_DanhMuc')->get();
                $payload['suppliers'] = Supplier::orderByDesc('ID_NCC')->get();
                break;

            case 'add-user':
                if ($request->isMethod('post') && $request->has('submit')) {
                    Member::create([
                        'TenDangNhap' => $request->input('username'),
                        'MatKhau' => $request->input('password'),
                        'Email' => $request->input('email'),
                        'HoVaTen' => $request->input('fullname'),
                        'DiaChi' => $request->input('address'),
                        'SoDienThoai' => $request->input('phonenumber'),
                        'NgayDangKi' => now()->toDateString(),
                    ]);

                    return redirect('/admin/index.php?view=list-user');
                }
                break;

            case 'list-user':
                $payload['members'] = Member::orderByDesc('ID_ThanhVien')->get();
                break;

            case 'fixUser':
                $member = Member::findOrFail($request->query('id'));
                if ($request->isMethod('post') && $request->has('submit')) {
                    $member->update([
                        'HoVaTen' => $request->input('HoVaTen'),
                        'DiaChi' => $request->input('DiaChi'),
                        'SoDienThoai' => $request->input('SoDienThoai'),
                    ]);

                    return redirect('/admin/index.php?view=list-user');
                }

                $payload['member'] = $member;
                break;

            case 'fixCategory':
                $category = Category::findOrFail($request->query('id'));
                if ($request->isMethod('post') && $request->has('submit')) {
                    $category->update([
                        'TenDanhMuc' => $request->input('TenDanhMuc'),
                        'Mota' => $request->input('Mota'),
                    ]);

                    return redirect('/admin/index.php?view=cat-product');
                }

                $payload['category'] = $category;
                break;

            case 'suaSanPham':
                $product = Product::findOrFail($request->query('id'));
                if ($request->isMethod('post') && $request->has('submit')) {
                    $product->update([
                        'TenSanPham' => $request->input('TenSanPham'),
                        'MoTa' => $request->input('MoTa'),
                        'GiaBan' => $request->input('GiaBan'),
                        'SoLuong' => $request->input('SoLuong', $product->SoLuong),
                        'Img' => $request->input('Img', $product->Img),
                        'ID_DanhMuc' => $request->input('danhmuc', $product->ID_DanhMuc),
                        'ID_NhaCungCap' => $request->input('nhacungcap', $product->ID_NhaCungCap),
                    ]);

                    return redirect('/admin/index.php?view=list-product');
                }

                $payload['product'] = $product;
                $payload['categories'] = Category::orderByDesc('ID_DanhMuc')->get();
                $payload['suppliers'] = Supplier::orderByDesc('ID_NCC')->get();
                break;

            case 'SuaNCC':
                $supplier = Supplier::findOrFail($request->query('id_NCC'));
                if ($request->isMethod('post') && $request->has('submit')) {
                    $supplier->update([
                        'TenNCC' => $request->input('name'),
                        'Email' => $request->input('email'),
                        'SoDienThoai' => $request->input('SoDienThoai'),
                        'DiaChi' => $request->input('DiaChi'),
                        'Img' => $request->input('Img', $supplier->Img),
                    ]);

                    return redirect('/admin/index.php?view=list-post');
                }

                $payload['supplier'] = $supplier;
                break;

            case 'list-product':
                $query = Product::with(['category', 'supplier']);
                if ($request->filled('tukhoa')) {
                    $query->where('TenSanPham', 'like', '%' . $request->input('tukhoa') . '%');
                }
                $payload['products'] = $query->orderByDesc('ID_SanPham')->get();
                break;

            case 'deleteCategory':
                Category::findOrFail($request->query('id'))->delete();
                return redirect('/admin/index.php?view=cat-product');

            case 'deleteNCC':
                Supplier::findOrFail($request->query('id_NCC'))->delete();
                return redirect('/admin/index.php?view=list-post');

            case 'deleteProduct':
                Product::findOrFail($request->query('id'))->delete();
                return redirect('/admin/index.php?view=list-product');

            case 'deleteUser':
                Member::findOrFail($request->query('id'))->delete();
                return redirect('/admin/index.php?view=list-user');

            case 'actionOrder':
                $this->updateOrderStatus((int) $request->query('id'), 1);
                return redirect('/admin/index.php?view=dashboard');

            case 'deleteOrder':
                $this->updateOrderStatus((int) $request->query('id'), 2);
                return redirect('/admin/index.php?view=dashboard');

            default:
                $payload['view'] = 'dashboard';
                $payload = array_merge($payload, $this->dashboardData());
                break;
        }

        return view('admin.index', $payload);
    }

    private function dashboardData(): array
    {
        $approvedCount = Invoice::where('XuLy', 1)->count();
        $pendingCount = Invoice::where('XuLy', 0)->count();
        $rejectedCount = Invoice::where('XuLy', 2)->count();
        $totalMoney = (float) Invoice::where('XuLy', 1)->sum('GiaTien');
        $pendingOrders = Invoice::where('XuLy', 0)->orderByDesc('ID_HoaDon')->get();

        return compact('approvedCount', 'pendingCount', 'rejectedCount', 'totalMoney', 'pendingOrders');
    }

    private function approvedOrdersData(): array
    {
        $orders = Invoice::where('XuLy', 1)->orderByDesc('ID_HoaDon')->get();
        $totalMoney = (float) $orders->sum('GiaTien');

        return compact('orders', 'totalMoney');
    }

    private function updateOrderStatus(int $invoiceId, int $status): void
    {
        $invoice = Invoice::findOrFail($invoiceId);
        $invoice->update(['XuLy' => $status]);
    }
}
