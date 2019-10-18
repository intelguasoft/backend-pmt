<?php

namespace Edgar\PMT\Http\Controllers;

use Edgar\PMT\Models\Ballot;
use Illuminate\Http\Request;

class MultasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ballots = Ballot::orderBy('id', 'desc')->paginate(6);
        return view('multas.listar', ['multas' => $ballots]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('multas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \Edgar\PMT\Models\Ballot  $ballot
     * @return \Illuminate\Http\Response
     */
    public function show(Ballot $ballot)
    {
        //
    }

    public function print(Ballot $ballot)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Edgar\PMT\Models\Ballot  $ballot
     * @return \Illuminate\Http\Response
     */
    public function anular(Ballot $ballot)
    {
        //
    }
}
