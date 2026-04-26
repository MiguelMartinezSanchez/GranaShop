<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;
use Barryvdh\DomPDF\Facade\Pdf;

class ProductPdfController extends Controller
{
    public function export()
    {
        $products = Products::all();

        $pdf = Pdf::loadView('admin.pdf.products', compact('products'));

        return $pdf->download('productos.pdf');
    }
}