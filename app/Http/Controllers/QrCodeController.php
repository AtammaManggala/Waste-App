<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Symfony\Component\CssSelector\XPath\Extension\FunctionExtension;

class QrCodeController extends Controller
{

    public function index()
    {
        $user = auth()->user();

        // keamanan tambahan: pastikan user login
        if (!$user) {
            abort(403);
        }

        // QR Code berisi ID user
        $qrCode = QrCode::size(200)->generate($user->id);
        return view('pengguna.layout.profil', compact('qrCode')); // profil.blade.php
        
    }

    public function show()
    {
        
    }
}
