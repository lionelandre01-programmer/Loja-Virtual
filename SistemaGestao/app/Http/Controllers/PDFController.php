<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Encomenda;
use App\Models\EncomendaItem;
use Dompdf\Dompdf;
use Dompdf\Options;

/**
 * Class PDFController
 *
 * Gera PDFs (facturas) a partir de uma encomenda.
 * Utiliza o Dompdf para renderizar uma view `sistema.pdf` e devolver
 * um download em PDF (`factura.pdf`).
 */
class PDFController extends Controller
{
    public function create($id)
    {
        // Busca a encomenda e gera um PDF de factura para download.
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
