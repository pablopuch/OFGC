<?php

namespace App\Http\Controllers;

use App\Models\Composer;
use Illuminate\Http\Request;

/**
 * Class ComposerController
 * @package App\Http\Controllers
 */
class ComposerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $composers = Composer::all();
        return $composers;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $composer = new Composer();
        // return view('composer.create', compact('composer'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $composer = new Composer();
        $composer->name = $request->name;
        $composer->surname = $request->surname;

        $composer->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $composer = Composer::find($id);

        // return view('composer.show', compact('composer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $composer = Composer::find($id);

        // return view('composer.edit', compact('composer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Composer $composer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $composer = Composer::findOrFail($request->id);
        $composer->name = $request->name;
        $composer->surname = $request->surname;

        $composer->save();

        return $composer;
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Request $request)
    {
        $composer = Composer::destroy($request->id);
        return $composer;
    }
}
