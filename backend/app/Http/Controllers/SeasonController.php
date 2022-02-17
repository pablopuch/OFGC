<?php

namespace App\Http\Controllers;

use App\Models\Season;
use Illuminate\Http\Request;

/**
 * Class SeasonController
 * @package App\Http\Controllers
 */
class SeasonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $seasons = Season::all();
        return $seasons;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$season = new Season();
        //return view('season.create', compact('season'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $season = new Season();
       $season->name = $request->name;
       $season->starDate = $request->starDate;
       $season->endDate = $request->endDate;
       $season->noteSeason = $request->noteSeason;

       $season->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$season = Season::find($id);

        //return view('season.show', compact('season'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //$season = Season::find($id);

        //return view('season.edit', compact('season'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Season $season
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $season = Season::findOrFail($request->id);
        $season->name = $request->name;
        $season->starDate = $request->starDate;
        $season->endDate = $request->endDate;
        $season->noteSeason = $request->noteSeason;

        $season->save();

        return $season;
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Request $request)
    {
        $season = Season::destroy($request->id);
        return $season;
    }
}
