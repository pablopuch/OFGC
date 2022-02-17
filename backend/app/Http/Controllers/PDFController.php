<?php
  
namespace App\Http\Controllers;

use App\Models\Director;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\PDF as PDF;
use Directors;
use FontLib\Table\Type\name;


class PDFController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function generatePDF()
    {
        $data = [
            'title' => 'Welcome to ItSolutionStuff.com',
            'date' => date('m/d/Y'),
            

        ];
        $pdfService = app('dompdf.wrapper');
        $pdf = $pdfService->loadView('myPDF', $data);
    
        return $pdf->download('itsolutionstuff.pdf');
    }

   
}