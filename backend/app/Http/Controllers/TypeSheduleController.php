<?php

namespace App\Http\Controllers;

use App\Models\TypeShedule;
use Illuminate\Http\Request;

/**
 * Class TypeSheduleController
 * @package App\Http\Controllers
 */
class TypeSheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $type_shedules = TypeShedule::all();
        return $type_shedules;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $typeShedule = new TypeShedule();
        // return view('type-shedule.create', compact('typeShedule'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $type_shedule = new TypeShedule();
        $type_shedule->name = $request->name;
        $type_shedule->hour_range_type = $request->hour_range_type;

        $type_shedule->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $typeShedule = TypeShedule::find($id);

        // return view('type-shedule.show', compact('typeShedule'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $typeShedule = TypeShedule::find($id);

        // return view('type-shedule.edit', compact('typeShedule'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  TypeShedule $typeShedule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $type_shedule = TypeShedule::findOrFail($request->id);
        $type_shedule->name = $request->name;
        $type_shedule->hour_range_type = $request->hour_range_type;

        $type_shedule->save();

        return $type_shedule;
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Request $request)
    {
        $type_shedule = TypeShedule::destroy($request->id);
        return $type_shedule;
    }
}
