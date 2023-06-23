<?php

namespace App\PDF;

use TCPDF;

class CustomPDF extends TCPDF
{
    // Override method Header() untuk menambahkan header pada halaman PDF
    public function Header()
    {
        // Menggunakan method includeHTML() untuk mengambil konten view header.blade.php
        $header = $this->includeHTML(public_path('path/to/export/header.blade.php'));
        $this->writeHTML($header, true, false, false, false, '');
    }
}


