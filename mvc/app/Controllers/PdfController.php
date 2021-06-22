<?php 

namespace App\Controllers;

use App\Models\Orders;
use Mpdf\Mpdf;


class PdfController {

    public function example ()
    {
        $order = Order::all()[0];

        $pdf = new Mpdf([
            'tempDir'=> __DIR__ . '/../../storage/tmp'
        ]);
        $pdf->WriteHtml("<h1> Invoice von {$order->id}</h1>");
        $pdf->Output();
    }
}