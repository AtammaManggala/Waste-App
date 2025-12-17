<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Symfony\Component\CssSelector\XPath\Extension\FunctionExtension;

class QrCodeController extends Controller
{
    public function show()
    {
        return QrCode::generate(
            'Hello world',
        );
    }
}
