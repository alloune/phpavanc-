<?php

namespace App\Http\Controllers;

use App\Models\TShirt;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;


class DownloadController extends Controller
{
    public function getOrderPdf(){

        $actualDate = Carbon::now();

        $pdf = PDF::loadView('pdfLayout', ['allOrder' => TShirt::all()]);

        return $pdf->download(\Str::slug($actualDate)."_orders.pdf");
    }

    public function getMergeImage(string $id){

        $order = TShirt::where('id', $id)->first();
        $link = str_replace('storage', 'public', $order->mergeImageUrl);

        return Storage::download($link);


    }


}
