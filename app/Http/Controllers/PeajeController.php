<?php

namespace Edgar\PMT\Http\Controllers;

use Edgar\PMT\Models\Toll;
use Illuminate\Http\Request;

use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Storage;

class PeajeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ahora = \Carbon\Carbon::now()->format('Y-m-d');
        // dd($ahora);
        $peajes = Toll::with('type_toll_vehicle')->where('date', $ahora)->paginate(10);
        $peajesTemp = Toll::all();
        $total_dia = $peajesTemp->sum('type_toll_vehicle.cost');
        return view('peaje.diario', compact('peajes', 'total_dia'));
        $this->generatePdf($peajesTemp, $total_dia);
    }

    public function mensual()
    {
        $ahora = \Carbon\Carbon::now()->format('Y-m-d');
        // dd($ahora);
        $peajes = Toll::with('type_toll_vehicle')->where('date', $ahora)->paginate(10);
        $peajesTemp = Toll::all();
        $total_dia = $peajesTemp->sum('type_toll_vehicle.cost');
        return view('peaje.mensual', compact('peajes', 'total_dia'));
        $this->generatePdf($peajesTemp, $total_dia);
    }

    public function generatePdfDiario()
    {
        // Storage::disk('local')->makeDirectory('fonts/', 0775, true);
        $peajesTemp = Toll::all();
        $total_dia = $peajesTemp->sum('type_toll_vehicle.cost');
        $pdf = PDF::loadView('peaje.reportes.diario', ['peajes' => $peajesTemp, 'total_dia' => $total_dia]);
        return $pdf->download('reporte-peaje-diario.pdf');
        // return view('peaje.reportes.diario', ['peajes' => $peajesTemp, 'total_dia' => $total_dia]);
    }

    public function generatePdfMensual(Request $request)
    {
        dd($request);

        // Storage::disk('local')->makeDirectory('fonts/', 0775, true);
        $peajesTemp = Toll::all();
        $total_dia = $peajesTemp->sum('type_toll_vehicle.cost');
        $pdf = PDF::loadView('peaje.reportes.diario', ['peajes' => $peajesTemp, 'total_dia' => $total_dia]);
        return $pdf->download('reporte-peaje-diario.pdf');
        // return view('peaje.reportes.diario', ['peajes' => $peajesTemp, 'total_dia' => $total_dia]);
    }
}
