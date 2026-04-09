<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Member;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function currentMember(): ?Member
    {
        $memberId = session('ID_ThanhVien');

        return $memberId ? Member::find($memberId) : null;
    }

    protected function currentAdmin(): ?Admin
    {
        $adminId = session('admin_id');

        return $adminId ? Admin::find($adminId) : null;
    }

    protected function requireMember(): ?RedirectResponse
    {
        if ($this->currentMember()) {
            return null;
        }

        return redirect('/ThanhVien/login.php');
    }

    protected function requireAdmin(): ?RedirectResponse
    {
        if ($this->currentAdmin()) {
            return null;
        }

        return redirect('/admin/login.php');
    }

    protected function passwordMatches(?string $stored, string $input): bool
    {
        if ($stored === null) {
            return false;
        }

        if ($stored === $input) {
            return true;
        }

        return Hash::check($input, $stored);
    }

    protected function cartData(): array
    {
        $cart = session()->get('cart', []);
        $items = 0;
        $total = 0;

        foreach ($cart as $item) {
            $qty = (int) ($item['qty'] ?? 0);
            $price = (float) ($item['GiaBan'] ?? 0);

            $items += $qty;
            $total += $qty * $price;
        }

        return [
            'cart' => $cart,
            'items' => $items,
            'total' => $total,
        ];
    }
}
