<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class PdfController extends Controller
{
    public function invoice()
    {
        $data = [
            'title' => 'Factura de Compra',
            'date' => date('d/m/Y'),
            'user' => 'Cliente Ejemplo',
            'items' => [
                ['name' => 'Producto 1', 'price' => 10],
                ['name' => 'Producto 2', 'price' => 20],
            ],
        ];

        $pdf = PDF::loadView('pdf.invoice', $data);

        return $pdf->download('factura.pdf');
    }
}