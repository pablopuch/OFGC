<?php

namespace App\Http\Controllers;

use App\Models\Director;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

/**
 * Class DirectorController
 * @package App\Http\Controllers
 */
class DirectorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $directors = Director::all();
        return $directors;
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$director = new Director();
        //return view('director.create', compact('director'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $director = new Director();
        $director->name = $request->name;
        $director->titleDirector = $request->titleDirector;

        $director->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $director = Director::find($id);

        // return view('director.show', compact('director'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $director = Director::find($id);

        // return view('director.edit', compact('director'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Director $director
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $director = Director::findOrFail($request->id);
        $director->name = $request->name;
        $director->titleDirector = $request->titleDirector;

        $director->save();

        return $director;
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Request $request)
    {
        $director = Director::destroy($request->id);
        return $director;
    }

    public function getAllDirectors(){
        
            $directors = Director::all();
            return view('myPDF', compact('directors'));
        
    }

    public function downloadPDF(){
        $directors = Director::all();
        $pdf = PDF::loadView('myPdf', compact('directors'));

        return $pdf->download('Director.pdf');
    }
    
}
