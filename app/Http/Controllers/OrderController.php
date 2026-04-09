<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\InvoiceItem;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index()
    {
        if ($redirect = $this->requireMember()) {
            return $redirect;
        }

        $member = $this->currentMember();
        $invoice = $this->latestInvoiceForMember($member->ID_ThanhVien);
        $items = $invoice ? $this->invoiceItems($invoice->ID_HoaDon) : collect();
        $cartState = $this->cartData();

        return view('orders.index', compact('member', 'invoice', 'items') + [
            'cart' => $cartState['cart'],
            'cartItems' => $cartState['items'],
            'cartTotal' => $cartState['total'],
        ]);
    }

    public function save(Request $request)
    {
        if ($redirect = $this->requireMember()) {
            return $redirect;
        }

        $member = $this->currentMember();
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect('/cart/index.php');
        }

        $total = 0;
        foreach ($cart as $item) {
            $total += ((int) $item['qty']) * ((float) $item['GiaBan']);
        }

        $invoice = DB::transaction(function () use ($member, $cart, $total) {
            $invoice = Invoice::create([
                'ID_ThanhVien' => $member->ID_ThanhVien,
                'ThoiGianLap' => now(),
                'DiaChi' => $member->DiaChi,
                'GhiChu' => '',
                'GiaTien' => $total,
                'SoDienThoai' => $member->SoDienThoai,
                'XuLy' => 0,
            ]);

            foreach ($cart as $item) {
                DB::table('chitiethoadon')->insert([
                    'ID_HoaDon' => $invoice->ID_HoaDon,
                    'ID_ThanhVien' => $member->ID_ThanhVien,
                    'ID_SanPham' => $item['ID_SanPham'],
                    'TenSanPham' => $item['TenSanPham'],
                    'GiaBan' => $item['GiaBan'],
                    'SoLuong' => $item['qty'],
                ]);
            }

            return $invoice;
        });

        session(['last_order_id' => $invoice->ID_HoaDon]);

        return redirect('/order/phuongthucthanhtoan.php?id=' . $member->ID_ThanhVien);
    }

    public function payment(Request $request)
    {
        if ($redirect = $this->requireMember()) {
            return $redirect;
        }

        $invoice = $this->invoiceFromRequestOrSession($request);
        if (!$invoice) {
            return redirect('/cart/index.php');
        }

        $member = Member::findOrFail($invoice->ID_ThanhVien);

        if ($request->isMethod('post') && $request->has('dathang')) {
            $method = $request->input('selectPay');

            if ($method === 'shipcod') {
                return redirect('/order/dathang.php');
            }

            return redirect('/order/finish.php');
        }

        $items = $this->invoiceItems($invoice->ID_HoaDon);
        $cartState = $this->cartData();

        return view('orders.payment', compact('invoice', 'member', 'items') + [
            'cart' => $cartState['cart'],
            'cartItems' => $cartState['items'],
            'cartTotal' => $cartState['total'],
        ]);
    }

    public function edit(Request $request)
    {
        if ($redirect = $this->requireMember()) {
            return $redirect;
        }

        $invoice = $this->invoiceFromRequestOrSession($request);
        if (!$invoice) {
            return redirect('/cart/index.php');
        }

        $member = Member::findOrFail($invoice->ID_ThanhVien);

        if ($request->isMethod('post') && $request->has('sua')) {
            $validated = $request->validate([
                'DiaChi' => 'required|string|max:30',
                'SoDienThoai' => 'required|string|max:10',
                'GhiChu' => 'nullable|string|max:30',
            ]);

            $invoice->update($validated);

            return redirect('/order/phuongthucthanhtoan.php?id=' . $member->ID_ThanhVien);
        }

        $items = $this->invoiceItems($invoice->ID_HoaDon);

        return view('orders.edit', compact('invoice', 'member', 'items'));
    }

    public function place(Request $request)
    {
        if ($redirect = $this->requireMember()) {
            return $redirect;
        }

        $invoice = $this->invoiceFromRequestOrSession($request);
        if (!$invoice) {
            return redirect('/index.php');
        }

        if ($request->isMethod('post') && $request->has('back')) {
            session()->forget('cart');
            session()->forget('last_order_id');

            return redirect('/index.php');
        }

        return view('orders.place', [
            'invoice' => $invoice,
        ]);
    }

    public function finish(Request $request)
    {
        if ($redirect = $this->requireMember()) {
            return $redirect;
        }

        $invoice = $this->invoiceFromRequestOrSession($request);
        if (!$invoice) {
            return redirect('/index.php');
        }

        if ($request->isMethod('post') && $request->has('back')) {
            session()->forget('cart');
            session()->forget('last_order_id');

            return redirect('/index.php');
        }

        return view('orders.finish', [
            'invoice' => $invoice,
        ]);
    }

    public function history()
    {
        if ($redirect = $this->requireMember()) {
            return $redirect;
        }

        $member = $this->currentMember();
        $approved = Invoice::where('ID_ThanhVien', $member->ID_ThanhVien)
            ->where('XuLy', 1)
            ->orderByDesc('ID_HoaDon')
            ->get();
        $pending = Invoice::where('ID_ThanhVien', $member->ID_ThanhVien)
            ->where('XuLy', '!=', 1)
            ->orderByDesc('ID_HoaDon')
            ->get();

        return view('orders.history', compact('member', 'approved', 'pending'));
    }

    private function latestInvoiceForMember(int $memberId): ?Invoice
    {
        return Invoice::where('ID_ThanhVien', $memberId)
            ->orderByDesc('ID_HoaDon')
            ->first();
    }

    private function invoiceItems(int $invoiceId)
    {
        return DB::table('chitiethoadon')
            ->where('ID_HoaDon', $invoiceId)
            ->orderBy('ID_SanPham')
            ->get();
    }

    private function invoiceFromRequestOrSession(Request $request): ?Invoice
    {
        $requestedId = $request->query('id');
        $member = $this->currentMember();

        if (!$member) {
            return null;
        }

        if ($requestedId) {
            $invoice = Invoice::where('ID_HoaDon', $requestedId)
                ->where('ID_ThanhVien', $member->ID_ThanhVien)
                ->first();

            if ($invoice) {
                return $invoice;
            }

            if ((int) $requestedId === (int) $member->ID_ThanhVien) {
                return $this->latestInvoiceForMember($member->ID_ThanhVien);
            }
        }

        $sessionInvoiceId = session('last_order_id');
        if ($sessionInvoiceId) {
            $invoice = Invoice::where('ID_HoaDon', $sessionInvoiceId)
                ->where('ID_ThanhVien', $member->ID_ThanhVien)
                ->first();

            if ($invoice) {
                return $invoice;
            }
        }

        return $this->latestInvoiceForMember($member->ID_ThanhVien);
    }
}
