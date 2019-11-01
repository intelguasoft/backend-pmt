<?php

namespace Edgar\PMT\Http\Controllers;

use Edgar\PMT\Http\Requests\Ballot\BallotStoreFormRequest;
use Edgar\PMT\Models\Ballot;
use Edgar\PMT\Models\Infringement;
use Edgar\PMT\Models\Mark;
use Edgar\PMT\Models\Offender;
use Edgar\PMT\Models\OffendingVehicle;
use Edgar\PMT\Models\TypeVehicle;
use Edgar\PMT\Models\State;
use Edgar\PMT\Models\City;
use Edgar\PMT\Models\PaymentBallot;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class MultasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pagadas = PaymentBallot::pluck('ballot_id');

        // dd($pagadas->toArray());

        $ballots = Ballot::whereNotIn('id', $pagadas->toArray())->where('is_voided', false)->orderBy('id', 'desc')->paginate(6);
        return view('multas.listar', ['multas' => $ballots]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $marcas = Mark::pluck('name', 'id');
        $tipoVehiculos = TypeVehicle::pluck('type', 'id');
        $states = State::pluck('name', 'id');
        $city = City::pluck('name', 'id');

        return view('multas.create', ['marcas' => $marcas, 'tipo_vehiculos' => $tipoVehiculos, 'states' => $states, 'city' => $city]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BallotStoreFormRequest $request)
    {
        // dd(!empty($request['signed']) ? 'true' : 'false');
        // dd($request->all());

        DB::transaction(function () use ($request) {

            $date = explode('-', $request->input('date'));
            $dateParse = $dt = Carbon::create($date[2], $date[1], $date[0]);

            $time = date('H:i:s', strtotime($request->input('time')));

            $newBallot = Ballot::create([
                'user_id' => auth()->user()->id,
                'ballot_no' => $request['ballot_no'],
                'signed' => !empty($request['signed']) ? true : false,
            ]);
            if (!$newBallot) {
                throw new \Exception('Ballot not created');
            }

            $newOffendingVehicle = OffendingVehicle::create([
                'car_plate'         => $request['prefijo_placa'] . "-" . $request['car_plate'],
                'nit'               => $request['nit'],
                'type_vehicle_id'   => $request['type_vehicle_id'],
                'mark_id'           => $request['mark_id'],
                'color_design'      => $request['color_design'],
                'ballot_id'         => $newBallot->id
            ]);
            if (!$newOffendingVehicle) {
                throw new \Exception('Offending vehicle not created');
            }

            $newOffender = Offender::create([
                'first_name' =>  $request['first_name'],
                'last_name' =>  $request['last_name'],
                'driver_license' =>  $request['driver_license'],
                'license_class' =>  $request['license_class'],
                'dpi' =>  $request['dpi'],
                'home_address' =>  $request['home_address'],
                'state' =>  $request['state'],
                'city' =>  $request['city'],
                'ballot_id' =>  $newBallot->id
            ]);
            if (!$newOffender) {
                throw new \Exception('Offender not created');
            }

            $newInfringement = Infringement::create([
                'date' =>  $dateParse,
                'time' =>  $time,
                'place' =>  $request['place'],
                'infringement_summary' =>  $request['infringement_summary'],
                'law_basics' =>  $request['law_basics'],
                'traffic_regulations' =>  $request['traffic_regulations'],
                'total' =>  $request['total'],
                'ballot_id' =>  $newBallot->id
            ]);
            if (!$newInfringement) {
                throw new \Exception('Infringement not created');
            }

            toast('Multa agregada satisfactoriamente!', 'success');
        });
        return redirect()->route('multas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \Edgar\PMT\Models\Ballot  $ballot
     * @return \Illuminate\Http\Response
     */
    public function show(Ballot $ballot)
    {
        // dd($ballot->with('user'));
        return view('multas.show', ['multa' => $ballot]);
    }

    public function print(Ballot $ballot)
    {
        return view('multas.reportes.print', ['multa' => $ballot]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Edgar\PMT\Models\Ballot  $ballot
     * @return \Illuminate\Http\Response
     */
    public function voided(Ballot $ballot)
    {
        return view('multas.voided', ['multa' => $ballot]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Edgar\PMT\Models\Ballot  $ballot
     * @return \Illuminate\Http\Response
     */
    public function anular(Ballot $ballot)
    {
        $ballot->is_voided = true;
        $ballot->save();

        toast('La multa fue anulada correctamente!', 'warning');

        return redirect()->route('multas.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function seizures(Request $request)
    {
        $now = Carbon::now();
        $multasDec = [];

        $multas = Ballot::where('is_voided', false)->get();

        foreach ($multas as $key => $value) {

            $date = Carbon::createFromFormat('d/m/Y', $value->infringement->date);


            if ($date->diffInDays($now) >= 31) {
                # code...
                $multasDec = $value;
            }
        }

        return view('multas.seizures', ['multas' => $multasDec]);
    }
}
