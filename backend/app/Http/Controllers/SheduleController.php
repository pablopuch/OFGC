<?php

namespace App\Http\Controllers;

use App\Models\Shedule;
use Illuminate\Http\Request;

/**
 * Class SheduleController
 * @package App\Http\Controllers
 */
class SheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shedules = Shedule::with('room', 'project', 'typeshedule')->get();
        return $shedules;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $shedule = new Shedule();
        // return view('shedule.create', compact('shedule'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $shedule = new Shedule();
        $shedule->project_id = $request->project_id; 
        $shedule->type_id = $request->type_id;
        $shedule->room_id = $request->room_id;
        $shedule->date = $request->date;
        $shedule->hour_range = $request->hour_range;
        $shedule->note = $request->note;

    
        $shedule->save();

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $shedule = Shedule::find($request->id);
        return $shedule;

        // return view('shedule.show', compact('shedule'));
    }

    public function showByProjectId(Request $request)
    {
        //Shedule::with('room', 'project', 'typeshedule')->get();
        $shedule = Shedule::with('room', 'project', 'typeshedule')->where('project_id', '=' ,$request->id)->get();
        return $shedule;

        // return view('shedule.show', compact('shedule'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * 
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $shedule = Shedule::find($id);

        // return view('shedule.edit', compact('shedule'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Shedule $shedule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $shedule = Shedule::findOrFail($request->id);
        $shedule->project_id = $request->project_id;
        $shedule->type_id = $request->type_id;
        $shedule->room_id = $request->room_id;
        $shedule->date = $request->date;
        $shedule->hour_range = $request->hour_range;
        $shedule->note = $request->note;

        $shedule->save();

        return $shedule;
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Request $request)
    {
        $shedule = Shedule::destroy($request->id);
        return $shedule;
    }
}
