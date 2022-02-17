<?php

namespace App\Http\Controllers;

use App\Models\Playlist;
use Illuminate\Http\Request;

/**
 * Class PlaylistController
 * @package App\Http\Controllers
 */
class PlaylistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $playlists = Playlists::all();
        return $playlists;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $playlist = new Playlist();
        // return view('playlist.create', compact('playlist'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $playlist = new Playlist();
        $playlist->project_id = $request->project_id;
        $playlist->composer_id = $request->composer_id;
        $playlist->work_id = $request->work_id;
        $playlist->orchestration_total = $request->orchestration_total;
        $playlist->order = $request->order;

        $playlist->save();

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $playlist = Playlist::find($id);

        // return view('playlist.show', compact('playlist'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $playlist = Playlist::find($id);

        // return view('playlist.edit', compact('playlist'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Playlist $playlist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $playlist = Playlist::findOrFail($request->id);
        $playlist->project_id = $request->project_id;
        $playlist->composer_id = $request->composer_id;
        $playlist->work_id = $request->work_id;
        $playlist->orchestration_total = $request->orchestration_total;
        $playlist->order = $request->order;

        $playlist->save();

        return $playlist;
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Request $request)
    {
        $playlist = Playlist::destroy($request->id);
        return $playlist;
    }
}
