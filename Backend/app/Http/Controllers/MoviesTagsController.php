<?php

namespace App\Http\Controllers;

use App\Models\movies_tags;
use App\Http\Requests\Storemovies_tagsRequest;
use App\Http\Requests\Updatemovies_tagsRequest;

class MoviesTagsController extends Controller
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
     * @param  \App\Http\Requests\Storemovies_tagsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storemovies_tagsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\movies_tags  $movies_tags
     * @return \Illuminate\Http\Response
     */
    public function show(movies_tags $movies_tags)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\movies_tags  $movies_tags
     * @return \Illuminate\Http\Response
     */
    public function edit(movies_tags $movies_tags)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatemovies_tagsRequest  $request
     * @param  \App\Models\movies_tags  $movies_tags
     * @return \Illuminate\Http\Response
     */
    public function update(Updatemovies_tagsRequest $request, movies_tags $movies_tags)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\movies_tags  $movies_tags
     * @return \Illuminate\Http\Response
     */
    public function destroy(movies_tags $movies_tags)
    {
        //
    }
}
