<?php

namespace App\Http\Controllers;

use App\Models\ControlVersion;
use Illuminate\Http\Request;

/**
 * Class ControlVersionController
 * @package App\Http\Controllers
 */
class ControlVersionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $controlVersions = ControlVersion::all();
        return $controlVersions;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $controlVersion = new ControlVersion();
        // return view('control-version.create', compact('controlVersion'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $controlVersion = new ControlVersion();
        $controlVersion->project_id = $request->project_id;
        $controlVersion->upgradeDate = $request->upgradeDate;
        $controlVersion->published = $request->published;

        $controlVersion->save();

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $controlVersion = ControlVersion::find($id);

        // return view('control-version.show', compact('controlVersion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $controlVersion = ControlVersion::find($id);

        // return view('control-version.edit', compact('controlVersion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  ControlVersion $controlVersion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $controlVersion = ControlVersion::findOrFail($request->id);
        $controlVersion->project_id = $request->project_id;
        $controlVersion->upgradeDate = $request->upgradeDate;
        $controlVersion->published = $request->published;

        $controlVersion->save();
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Request $request)
    {
        $controlVersion = ControlVersion::destroy($request->id);
        return $controlVersion;
    }
}
