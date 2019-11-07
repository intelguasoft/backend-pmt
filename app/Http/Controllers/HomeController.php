<?php

namespace Edgar\PMT\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Fragment\RoutableFragmentRenderer;
use Khill\Lavacharts\Lavacharts;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
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

        $finanzas = $lava->ColumnChart('Finances', $finances, [
            'title' => 'Company Performance',
            'titleTextStyle' => [
                'color'    => '#eb6b2c',
                'fontSize' => 14
            ]
        ]);

        return view('home', ['finanzas' => $finanzas]);
    }
}
