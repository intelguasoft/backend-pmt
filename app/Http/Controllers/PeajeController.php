<?php

namespace Edgar\PMT\Http\Controllers;

use Edgar\PMT\Models\Toll;
use Illuminate\Http\Request;

use Barryvdh\DomPDF\Facade as PDF;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Storage;

class PeajeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function diario(Request $request)
    {
        $ahora = \Carbon\Carbon::now()->format('Y-m-d');
        dd($request->user('api'));
        $peajes = Toll::with('type_toll_vehicle')->where('date', $ahora)->paginate(10);
        // dd($peajes);
        $peajesTemp = Toll::where('date', $ahora)->get();
        $total_dia = $peajesTemp->sum('type_toll_vehicle.cost');
        return view('peaje.diario', compact('peajes', 'total_dia'));
        $this->generatePdf($peajesTemp, $total_dia);
    }

    public function mensual()
    {
        $inicial = \Carbon\Carbon::now()->startOfMonth()->toDateString();
        $final = \Carbon\Carbon::now()->endOfMonth()->toDateString();
        // dd($inicial, $final);
        $peajes = Toll::with('type_toll_vehicle')->whereBetween('date', [$inicial, $final])->paginate(10);
        $peajesTemp = Toll::whereBetween('date', [$inicial, $final])->get();
        $total_dia = $peajesTemp->sum('type_toll_vehicle.cost');
        return view('peaje.mensual', compact('peajes', 'total_dia', 'inicial', 'final'));
        $this->generatePdf($peajesTemp, $total_dia);
    }

    public function generate_diario()
    {
        // Storage::disk('local')->makeDirectory('fonts/', 0775, true);
        $ahora = \Carbon\Carbon::now()->format('Y-m-d');
        // dd($ahora);
        $peajes = Toll::with('type_toll_vehicle')->where('date', $ahora)->get();
        $peajesTemp = Toll::where('date', $ahora)->get();
        $total_dia = $peajesTemp->sum('type_toll_vehicle.cost');
        $pdf = PDF::loadView('peaje.reportes.diario', ['peajes' => $peajes, 'total_dia' => $total_dia]);
        return $pdf->download('reporte-peaje-diario.pdf');
        // return view('peaje.reportes.diario', ['peajes' => $peajesTemp, 'total_dia' => $total_dia]);
    }

    public function generate_mensual(Request $request)
    {
        // $inicial = \Carbon\Carbon::createFromFormat('Y-m-d', $request->input('inicial'));
        // $inicialdt = \Carbon\Carbon::createFromFormat('Y-m-d', $request->input('inicial'));
        $arrInicial = explode('-', $request->input('inicial'));
        $arrFinal = explode('-', $request->input('final'));
        $inicial = $dt = \Carbon\Carbon::create($arrInicial[2], $arrInicial[1], $arrInicial[0]);
        $final = $dt = \Carbon\Carbon::create($arrFinal[2], $arrFinal[1], $arrFinal[0]);
        // dd($inicialdt, $finaldt);
        // Storage::disk('local')->makeDirectory('fonts/', 0775, true);
        $peajesTemp = Toll::whereBetween('date', [$inicial, $final])->get();
        $total_dia = $peajesTemp->sum('type_toll_vehicle.cost');
        $pdf = PDF::loadView('peaje.reportes.mensual', ['peajes' => $peajesTemp, 'total_dia' => $total_dia, 'inicial' => $inicial, 'final' => $final]);
        return $pdf->download('reporte-peaje-diario.pdf');
        // return view('peaje.reportes.diario', ['peajes' => $peajesTemp, 'total_dia' => $total_dia]);
    }
}
