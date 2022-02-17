<?php

namespace App\Http\Controllers;

use App\Models\SolistProject;
use Illuminate\Http\Request;

/**
 * Class SolistProjectController
 * @package App\Http\Controllers
 */
class SolistProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $solistProjects = SolistProject::with('soloist')->get();
        return $solistProjects;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $solistProject = new SolistProject();
        // return view('solist-project.create', compact('solistProject'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $solistProject = new SolistProject();
        $solistProject->project_id = $request->project_id;
        $solistProject->soloists_id = $request->soloists_id;

        $solistProject->save();

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $solistProject = SolistProject::find($id);

        // return view('solist-project.show', compact('solistProject'));
    }

    public function showByProjectId(Request $request)
    {
        $solistProject = SolistProject::with('soloist')->where('project_id', '=' ,$request->id)->get();
        return $solistProject;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $solistProject = SolistProject::find($id);

        // return view('solist-project.edit', compact('solistProject'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  SolistProject $solistProject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $solistProject = SolistProject::findOrFail($request->id);
        $solistProject->project_id = $request->project_id;
        $solistProject->soloists_id = $request->soloists_id;

        $solistProject->save();

        return $solistProject;
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Request $request)
    {
        $solistProject = SolistProject::destroy($request->id);
        return $solistProject;
    }
}
