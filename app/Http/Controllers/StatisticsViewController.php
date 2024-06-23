<?php

namespace App\Http\Controllers;

use App\Models\StatisticsView;
use App\Http\Requests\StoreStatisticsViewRequest;
use App\Http\Requests\UpdateStatisticsViewRequest;

class StatisticsViewController extends Controller
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
     * @param  \App\Http\Requests\StoreStatisticsViewRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStatisticsViewRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StatisticsView  $statisticsView
     * @return \Illuminate\Http\Response
     */
    public function show(StatisticsView $statisticsView)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StatisticsView  $statisticsView
     * @return \Illuminate\Http\Response
     */
    public function edit(StatisticsView $statisticsView)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStatisticsViewRequest  $request
     * @param  \App\Models\StatisticsView  $statisticsView
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStatisticsViewRequest $request, StatisticsView $statisticsView)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StatisticsView  $statisticsView
     * @return \Illuminate\Http\Response
     */
    public function destroy(StatisticsView $statisticsView)
    {
        //
    }
}
