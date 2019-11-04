<?php

namespace Edgar\PMT\Http\Controllers;

use Carbon\Carbon;
use Edgar\PMT\Http\Requests\PaymentBallot\PaymentBallotStoreFormRequest;
use Edgar\PMT\Models\PaymentBallot;
use Edgar\PMT\Models\Ballot;
use Illuminate\Http\Request;

class PaymentBallotController extends Controller
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
        // dd($request->all());
        if (isset($request->q)) {
            $multaspagadas = PaymentBallot::where('name', 'like', "%$request->q%")->paginate(10);
        } else {
            $multaspagadas = PaymentBallot::paginate(10);
        }
        return view('admin.multas-cobradas.index')->with('multaspagadas', $multaspagadas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Ballot $ballot)
    {

        return view('admin.multas-cobradas.create', ['multa' => $ballot]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PaymentBallotStoreFormRequest $request)
    {
        $date = Carbon::now()->toDateString();
        $time = Carbon::now()->toTimeString();
        // dd($date, $time);
        $paymentballot = new PaymentBallot();
        $paymentballot->ballot_id = $request->input('ballot_id');
        $paymentballot->user_id = auth()->user()->id;
        $paymentballot->date = $date;
        $paymentballot->time = $time;
        $paymentballot->comment = $request->input('comment');
        $paymentballot->total = $request->input('total');
        $paymentballot->save();

        // alert()->success('Creación de perfil','Perfil creado satisfactoriamente!')->persistent(true,false);
        toast('Se ha cobrado exitosamente la multa!', 'success');
        return redirect()->route('multas-cobradas.index');
    }
    /**
     * Display the specified resource.
     *
     * @param  \Edgar\PMT\PaymentBallot  $paymentBallot
     * @return \Illuminate\Http\Response
     */
    public function show(Ballot $ballot)
    {
        return view('admin.multas-cobradas.show', ['multa' => $ballot]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \Edgar\PMT\PaymentBallot  $paymentBallot
     * @return \Illuminate\Http\Response
     */
    public function listar(Ballot $ballots)
    {
        $pagadas = PaymentBallot::pluck('ballot_id');

        // dd($pagadas->toArray());

        $ballots = Ballot::whereNotIn('id', $pagadas->toArray())->where('is_voided', false)->orderBy('id', 'desc')->paginate(6);
        return view('admin.multas-cobradas.listar', ['multas' => $ballots]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Edgar\PMT\PaymentBallot  $paymentBallot
     * @return \Illuminate\Http\Response
     */
    public function edit(PaymentBallot $paymentBallot)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Edgar\PMT\PaymentBallot  $paymentBallot
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PaymentBallot $paymentBallot)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Edgar\PMT\PaymentBallot  $paymentBallot
     * @return \Illuminate\Http\Response
     */
    public function destroy(PaymentBallot $paymentBallot)
    {
        //
    }
}
