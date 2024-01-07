<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use DB;
use App\Models\Product;

class exportPDFController extends Controller
{
    public function exportPDF()
    {
        $products = DB::table('products')->limit(20)->get();
        $topic = "รายงานรายการสินค้าทั้งหมด";
        $line = "--------------------------------------------------";

        PDF::SetMargins(10, 40, 0);
        PDF::setHeaderCallback(function ($pdf) use ($topic, $line) {

            PDF::SetFont('freeserif', 'B', 16, '', 'false');
            PDF::SetY(20);
            PDF::SetX(0);
            PDF::Cell(0, 0, $topic, 0, false, 'C', false, 1);

            PDF::SetFont('freeserif', 'B', 16, '', 'false');
            PDF::SetY(27);
            PDF::SetX(0);
            PDF::Cell(0, 0, $line, 0, false, 'C', false, 1);
        });

        PDF::setFooterCallback(function ($pdf) {
            $pdf->SetY(-15);

            $pdf->SetFont('freeserif', '', 16, 'false');

            $pdf->Cell(0, 15, 'หน้า ' . $pdf->getAliasNumPage() . ' จาก ' . $pdf->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
        });

        PDF::AddPage('A4');
        $html = '<table border="0" with="400px">
        <thead>
            <tr>
                <th with="15%"><b>ลำดับที่</b></th>
                <th with="40%"><b>รายการสินค้า</b></th>
                <th with="35%"><b>ราคา</b></th>
                <th with="35%"><b>สต๊อก</b></th>
            </tr>
        </thead>
        <tbody>';
        $i = 1;
        foreach ($products as $item) {
            $html .= '
            <tr>
                <td with="15%">' . $i++ . '.</td>
                <td with="40%">' . $item->name . '</td>
                <td with="35%">' . $item->price . '</td>
                <td with="35%">' . $item->stock . '</td>
            </tr>
            ';
        }
        $html .= '</tbody></table><br/>' . $line;

        PDF::SetFont('freeserif', '', 16, '', 'false');
        PDF::writeHTML($html, true, false, true, false, '');

        PDF::lastPage();
        PDF::setPrintFooter(true);
        PDF::Output('product.pdf', 'i');
        PDF::reset();
        PDF::endPage();
    }
}
