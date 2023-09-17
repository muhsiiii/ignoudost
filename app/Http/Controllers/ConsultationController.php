<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class ConsultationController extends Controller
{
    public function Consultation()
    {
        $consultations = Consultation::paginate(10);
        $consultationCount = Consultation::count();
        return view('admin.consultation', compact('consultations', 'consultationCount'));
    }


    public function ConsultExcel(Request $request)
    {
        $Consultaions=Consultation::where('created_at','>=',$request->from)->where('created_at','<=',$request->to)->get();

        $pdf = PDF::loadView('admin.tableconsultexport',compact('Consultaions'));

        $pdf->getDomPDF()->setHttpContext(
            stream_context_create([
                'ssl' => [
                    'allow_self_signed' => TRUE,
                    'verify_peer' => FALSE,
                    'verify_peer_name' => FALSE,
                ]
            ])
        );

        $pdf_name = 'Leave Application.pdf';
        return $pdf->download($pdf_name);
    }

   
}
