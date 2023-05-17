<?php

namespace App\Http\Controllers;

use App\Models\postlike;
use Illuminate\Http\Request;

class PostlikeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        dd('come');
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\postlike  $postlike
     * @return \Illuminate\Http\Response
     */
    public function show(postlike $postlike)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\postlike  $postlike
     * @return \Illuminate\Http\Response
     */
    public function edit(postlike $postlike)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\postlike  $postlike
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, postlike $postlike)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\postlike  $postlike
     * @return \Illuminate\Http\Response
     */
    public function destroy(postlike $postlike)
    {
        //
    }
}
