<?php

namespace App\Http\Controllers;

use App\Models\Soloist;
use Illuminate\Http\Request;

/**
 * Class SoloistController
 * @package App\Http\Controllers
 */
class SoloistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $soloists = Soloist::all();
        return $soloists;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $soloist = new Soloist();
        // return view('soloist.create', compact('soloist'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $soloist = new Soloist();
        $soloist->name = $request->name;
        $soloist->titleSoloist = $request->titleSoloist;

        $soloist->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $soloist = Soloist::find($id);

        // return view('soloist.show', compact('soloist'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $soloist = Soloist::find($id);

        // return view('soloist.edit', compact('soloist'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Soloist $soloist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $soloist = Soloist::findOrFail($request->id);
        $soloist->name = $request->name;
        $soloist->titleSoloist = $request->titleSoloist;

        $soloist->save();

        return $soloist;
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Request $request)
    {
        $soloist = Soloist::destroy($request->id);
        return $soloist;
    }
}
