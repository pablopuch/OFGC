<?php

namespace App\Http\Controllers;

use App\Models\DirectorProject;
use Illuminate\Http\Request;

/**
 * Class DirectorProjectController
 * @package App\Http\Controllers
 */
class DirectorProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $directorProjects = DirectorProject::with('director')->get();
        return $directorProjects;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $directorProject = new DirectorProject();
        // return view('director-project.create', compact('directorProject'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $directorProject = new DirectorProject();
        $directorProject->project_id = $request->project_id;
        $directorProject->director_id = $request->director_id;

        $directorProject->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $directorProject = DirectorProject::find($id);

        // return view('director-project.show', compact('directorProject'));
    }

    public function showByProjectId(Request $request)
    {
        $directorProject = DirectorProject::with('director')->where('project_id', '=' ,$request->id)->get();
        return $directorProject;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $directorProject = DirectorProject::find($id);

        // return view('director-project.edit', compact('directorProject'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  DirectorProject $directorProject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $directorProject = DirectorProject::findOrFail($request->id);
        $directorProject->project_id = $request->project_id;
        $directorProject->director_id = $request->director_id;

        $directorProject->save();

        return $directorProject;

    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Request $request)
    {
       $directorProject = DirectorProject::destroy($request->id);
       return $directorProject;
    }
}
