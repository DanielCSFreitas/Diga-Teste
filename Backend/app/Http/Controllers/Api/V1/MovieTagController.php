<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\movie_tag;
use App\Http\Requests\Storemovie_tagRequest;
use App\Http\Requests\Updatemovie_tagRequest;

use App\Http\Controllers\Controller;

class MovieTagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Storemovie_tagRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storemovie_tagRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\movie_tag  $movie_tag
     * @return \Illuminate\Http\Response
     */
    public function show(movie_tag $movie_tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\movie_tag  $movie_tag
     * @return \Illuminate\Http\Response
     */
    public function edit(movie_tag $movie_tag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatemovie_tagRequest  $request
     * @param  \App\Models\movie_tag  $movie_tag
     * @return \Illuminate\Http\Response
     */
    public function update(Updatemovie_tagRequest $request, movie_tag $movie_tag)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\movie_tag  $movie_tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(movie_tag $movie_tag)
    {
        //
    }
}
