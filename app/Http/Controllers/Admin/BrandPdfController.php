<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brands;
use Barryvdh\DomPDF\Facade\Pdf;

class BrandPdfController extends Controller
{
    public function export()
    {
        $brands = Brands::all();

        $pdf = Pdf::loadView('admin.pdf.brands', compact('brands'));

        return $pdf->download('marcas.pdf');
    }
}