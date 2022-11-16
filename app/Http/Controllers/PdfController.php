<?php

namespace App\Http\Controllers;

use App\Models\TShirt;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;


class PdfController extends Controller
{
    public function getOrderPdf(){

        $actualDate = Carbon::now();

        $pdf = PDF::loadView('pdfLayout', ['allOrder' => TShirt::all()]);

        return $pdf->download(\Str::slug($actualDate)."_orders.pdf");
    }
}
