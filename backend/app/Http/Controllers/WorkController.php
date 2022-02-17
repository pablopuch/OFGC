<?php

namespace App\Http\Controllers;

use App\Models\Work;
use Illuminate\Http\Request;

/**
 * Class WorkController
 * @package App\Http\Controllers
 */
class WorkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $works = Work::all();
        return $works;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $work = new Work();
        // return view('work.create', compact('work'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $work = new Work();
        $work->composer_id = $request->composer_id;
        $work->name = $request->name;
        $work->duration = $request->duration;
        $work->orchestration_work = $request->orchestration_work;
        $work->string_work = $request->string_work;
        $work->note = $request->note;

        $work->save();
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $work = Work::find($id);

        // return view('work.show', compact('work'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $work = Work::find($id);

        // return view('work.edit', compact('work'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Work $work
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $work = Work::findOrFail($request->id);
        $work->composer_id = $request->composer_id;
        $work->name = $request->name;
        $work->duration = $request->duration;
        $work->orchestration_work = $request->orchestration_work;
        $work->string_work = $request->string_work;
        $work->note = $request->note;

        $work->save();

        return $work;
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Request $request)
    {
        $work = Work::destroy($request->id);
        return $work;
    }
}
