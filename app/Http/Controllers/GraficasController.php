<?php

namespace Edgar\PMT\Http\Controllers;

use Edgar\PMT\Models\PaymentBallot;
use Edgar\PMT\Models\Toll;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class GraficasController extends Controller
{
    public function summonth2(Request $request)
    {
        $sumamultasmes = PaymentBallot::select(
            DB::raw('sum(total) as sums'),
            DB::raw("DATE_FORMAT(date,'%m') as monthKey")
        )
            ->whereYear('date', date('Y'))
            ->groupBy('monthKey')
            ->orderBy('date', 'ASC')
            ->get();

        dd($sumamultasmes);
    }

    public function totales_meses(Request $request)
    {
        $data_graph = [];
        $data = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
        $yearlyAmount = PaymentBallot::all()
            ->groupBy(function ($proj) {
                return \Carbon\Carbon::parse($proj->date)->format('m');
            })
            ->map(function ($year) {
                return $year->sum('total');
            });


        foreach ($yearlyAmount as $key => $month) {
            // dd($key);
            foreach ($data as $i => $d) {
                if (($i + 1) == $key) {
                    $data[$i] = $month;
                }
                $data_graph[$i] = [$meses[$i], $data[$i]];
            }
            // if($mont)
            // $data[$mont->monthKey - 1] = $order->sums;
        }
        return $data_graph;
    }

    public function peaje_totales_meses()
    {
        $data_graph_peajes = [];
        $data = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
        $yearlyAmount = Toll::with('type_toll_vehicle')->get()
            ->groupBy(function ($proj) {
                return \Carbon\Carbon::parse($proj->date)->format('m');
            })
            ->map(function ($year) {
                return $year->sum('type_toll_vehicle.cost');
            });


        foreach ($yearlyAmount as $key => $month) {
            // dd($key);
            foreach ($data as $i => $d) {
                if (($i + 1) == $key) {
                    $data[$i] = $month;
                }
                $data_graph_peajes[$i] = [$meses[$i], $data[$i]];
            }


            // if($mont)
            // $data[$mont->monthKey - 1] = $order->sums;
        }

        return $data_graph_peajes;
    }
}
