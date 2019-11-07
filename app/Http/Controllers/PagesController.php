<?php

namespace Edgar\PMT\Http\Controllers;

use Edgar\PMT\Models\Ballot;
use Edgar\PMT\Models\PaymentBallot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class PagesController extends Controller
{
    public function index(Request $request)
    {
        $inputs = $request->all();
        $prefijo = $request->query('prefijo');
        $placa = $request->query('placa');

        if (!is_null($placa) && !empty($placa)) {
            $validator = Validator::make($inputs, ['prefijo' => 'required', 'placa' => 'required'], ['prefijo.required' => 'Seleccione un tipo de placa.', 'placa.required' => 'El numero de placa es requerido']);
            if ($validator->fails()) {
                return Redirect::to('/')->withErrors($validator);
            }
            $placaFinal = $prefijo . '-' . $placa;
            $pagadas = PaymentBallot::pluck('ballot_id');
            $scroll = true;
            $ballots = Ballot::whereHas(
                'offending_vehicle',
                function ($query) use ($placaFinal) {
                    $query->where('car_plate', 'like', '%' . $placaFinal . '%');
                }
            )->whereNotIn('id', $pagadas->toArray())->where('is_voided', false)->orderBy('id', 'desc')->paginate(6);
            // dd($ballots);
            return view('frontend.welcome', ['multas' => $ballots, 'scroll' => $scroll]);

        } else {
            $scroll = false;
            $ballots = [];
        }
        return view('frontend.welcome', ['multas' => $ballots, 'scroll' => $scroll]);

    }
}