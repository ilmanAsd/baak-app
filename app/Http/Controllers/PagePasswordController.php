<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PagePassword;

class PagePasswordController extends Controller
{
    public function authenticate(Request $request)
    {
        $request->validate([
            'password' => 'required',
            'protection_id' => 'required|exists:page_passwords,id',
            'redirect_url' => 'required'
        ]);

        $protection = PagePassword::find($request->protection_id);

        if ($protection && $request->password === $protection->password) {
            $sessionKey = 'page_password_' . $protection->id;
            session([$sessionKey . '_at' => now()]);

            return redirect($request->redirect_url);
        }

        return back()->with('error', 'Password yang Anda masukkan salah.');
    }
}
