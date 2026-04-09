<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function show()
    {
        if ($redirect = $this->requireMember()) {
            return $redirect;
        }

        $member = $this->currentMember();

        return view('contact', compact('member'));
    }

    public function send(Request $request)
    {
        if ($redirect = $this->requireMember()) {
            return $redirect;
        }

        $member = $this->currentMember();
        $request->validate([
            'NoiDung' => 'required|string',
        ]);

        Contact::create([
            'ID_ThanhVien' => $member->ID_ThanhVien,
            'TenThanhVien' => $member->HoVaTen,
            'Email' => $member->Email,
            'NoiDung' => $request->input('NoiDung'),
            'ThoiGianLienHe' => now(),
        ]);

        return redirect('/contact.php?id=' . $member->ID_ThanhVien)
            ->with('success', 'Gửi liên hệ thành công.');
    }
}
