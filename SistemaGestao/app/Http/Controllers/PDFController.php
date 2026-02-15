<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Encomenda;
use App\Models\EncomendaItem;
use Dompdf\Dompdf;
use Dompdf\Options;

class PDFController extends Controller
{
    public function create($id)
    {
        $encomenda = Encomenda::find($id);
        $encomendas = EncomendaItem::where('encomenda_id', $encomenda->id)->get();

        $html = view('sistema.pdf', ['encomendas' => $encomendas, 'encomenda' => $encomenda])->render();

        $options = new Options();
        $options->set('defaultFont', 'DejaVu Sans');

        $pdf = new Dompdf($options);

        $pdf->loadHtml($html);

        $pdf->setPaper('A4', 'portrait');

        $pdf->render();

        return response()->streamDownload(
            function () use ($pdf) {
                echo $pdf->output();
            },
            'factura.pdf'
        );
    }
}
