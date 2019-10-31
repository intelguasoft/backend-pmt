<?php

namespace Edgar\PMT\Http\Controllers;

use Edgar\PMT\Http\Requests\CostosPeajes\CostosPeajesStoreFormRequest;
use Edgar\PMT\Http\Requests\CostosPeajes\TypeTollVehicleUpdateFormRequest;
use Illuminate\Http\Request;
use Edgar\PMT\Models\TypeTollVehicle;
use Edgar\PMT\Models\TypeVehicle;

class CostosPeajeController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (isset($request->q)) {
            $costospeajes = TypeTollVehicle::where('name', 'like', "%$request->q%")->paginate(10);
        } else {
            $costospeajes = TypeTollVehicle::paginate(10);
        }
        return view('costos-peajes.index')->with('costospeajes', $costospeajes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipoVehiculos = TypeVehicle::pluck('type', 'id');



        return view('costos-peajes.create', ['tipo_vehiculos' => $tipoVehiculos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CostosPeajesStoreFormRequest $request)
    {
        // dd($request->all());
        $data = $request->all();

        TypeTollVehicle::create($data);

        // alert()->success('Creación de perfil','Perfil creado satisfactoriamente!')->persistent(true,false);
        toast('Costo de Vehículo se ha creado satisfactoriamente!', 'success');

        return redirect()->route('costos-peajes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \Edgar\PMT\type_toll_vehicles  $type_toll_vehicles
     * @return \Illuminate\Http\Response
     */
    public function show(TypeTollVehicle $costos)
    {
        return view('costos-peajes.show', ['costos' => $costos]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Edgar\PMT\type_toll_vehicles  $type_toll_vehicles
     * @return \Illuminate\Http\Response
     */
    public function edit(TypeTollVehicle $costos)
    {
        $tipoVehiculos = TypeVehicle::pluck('type', 'id');

        return view('costos-peajes.edit', ['costos' => $costos, 'tipo_vehiculos' => $tipoVehiculos]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Edgar\PMT\type_toll_vehicles  $type_toll_vehicles
     * @return \Illuminate\Http\Response
     */
    public function update(TypeTollVehicleUpdateFormRequest $request, TypeTollVehicle $costos)
    {
        // dd($request->all());
        $costos->type_vehicle_id = $request->input('type_vehicle_id');
        $costos->cost = $request->input('cost');
        $costos->description = $request->input('description');
        $costos->prefix_car_plate = $request->input('prefix_car_plate');
        $costos->save();

        toast('Costo de Vehículo se ha actualizado satisfactoriamente!', 'success');

        return redirect()->route('costos-peajes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Edgar\PMT\type_toll_vehicles  $type_toll_vehicles
     * @return \Illuminate\Http\Response
     */
    public function delete(TypeTollVehicle $costos)
    {

        return view('costos-peajes.delete', compact('costos'));
    }

    public function destroy(TypeTollVehicle $costos)
    {
        $costos->delete();

        return redirect()->route('costos-peajes.index');
    }
}
