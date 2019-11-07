<?php

namespace Edgar\PMT\Http\Controllers;

use Edgar\PMT\Models\PaymentBallot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Khill\Lavacharts\Lavacharts;

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

    public function graph()
    {
        $lava = new Lavacharts; // See note below for Laravel

        $finances = $lava->DataTable();

        $finances->addDateColumn('Year')
            ->addNumberColumn('Sales')
            ->setDateTimeFormat('Y')
            ->addRow(['2004', 1000])
            ->addRow(['2005', 1170])
            ->addRow(['2006', 660])
            ->addRow(['2007', 1030]);

        $lava->ColumnChart('Finances', $finances, [
            'title' => 'Company Performance',
            'titleTextStyle' => [
                'color'    => '#eb6b2c',
                'fontSize' => 14
            ]
        ]);
    }
}
