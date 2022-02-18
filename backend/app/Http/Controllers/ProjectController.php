<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\PseudoTypes\True_;

/**
 * Class ProjectController
 * @package App\Http\Controllers
 */
class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::with('season', )->get();
        return $projects;
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$project = new Project();
        //return view('project.create', compact('project'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $project = new Project();
       $project->season_id = $request->season_id;
       $project->name = $request->name;
       $project->starDate = $request->starDate;
       $project->endDate = $request->endDate;
       $project->published = $request->published;

       $project->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $project = Project::find($request->id);
        return $project;
   
    }

    public function public(Request $request){
        $project = Project::where('published', '=',$request->published)->get();
        return $project;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //$project = Project::find($id);

        //return view('project.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Project $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $project = Project::findOrFail($request->id);
        $project->season_id = $request->season_id;
        $project->name = $request->name;
        $project->starDate = $request->starDate;
        $project->endDate = $request->endDate;
        $project->published = $request->published;

        $project->save();

        return $project;
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Request $request)
    {
        $project = Project::destroy($request->id);
        return $project;
    }
}
