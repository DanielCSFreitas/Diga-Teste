<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Movie;
use App\Http\Requests\StoreMovieRequest;
use App\Http\Requests\UpdateMovieRequest;
use App\Http\Resources\V1\MovieResource;
use App\Http\Resources\V1\MovieCollection;
//use App\Filters\V1\MovieFilter;
use Illuminate\Http\Request;     

use App\Http\Controllers\Controller;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $orderBy = $request->input('orderBy');
        $inverse = $request->input('Desc');
        switch ($orderBy){
            case 'name':
                if($inverse=='true'){
                    return new MovieCollection(Movie::with(['tag'])->get()->sortByDesc('name'));
                    break;
                }
                return new MovieCollection(Movie::with(['tag'])->get()->sortBy('name'));
                break;
            case 'file':
                if($inverse=='true'){
                    return new MovieCollection(Movie::with(['tag'])->get()->sortByDesc('file_size'));
                    break;
                }
                return new MovieCollection(Movie::all()->sortBy('file_size'));
                break;
            case 'date':
                if($inverse=='true'){
                    return new MovieCollection(Movie::with(['tag'])->get()->sortByDesc('created_at'));
                    break;
                }
                return new MovieCollection(Movie::with(['tag'])->get()->sortBy('created_at'));
                break;
            default:
                if($inverse=='true'){
                    return new MovieCollection(Movie::with(['tag'])->get()->sortByDesc('name'));
                    break;
                }
                return new MovieCollection(Movie::with(['tag'])->get()->sortBy('name'));
                break;
        }
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
     * @param  \App\Http\Requests\StoreMovieRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMovieRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $movie = Movie::find($id);

        return new MovieResource($movie);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function edit(Movie $movie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMovieRequest  $request
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMovieRequest $request, Movie $movie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movie $movie)
    {
        //
    }
}
