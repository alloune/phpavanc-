<?php

namespace App\Http\Controllers;

use App\Models\TShirt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TShirtController extends Controller
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
        $allTShirt = Storage::allFiles('public/images');

        return view('parameters', [
            'allTShirt' => $allTShirt,
        ]);
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
     * @param  \App\Models\TShirt  $tShirt
     * @return \Illuminate\Http\Response
     */
    public function show(TShirt $tShirt)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TShirt  $tShirt
     * @return \Illuminate\Http\Response
     */
    public function edit(TShirt $tShirt)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TShirt  $tShirt
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TShirt $tShirt)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TShirt  $tShirt
     * @return \Illuminate\Http\Response
     */
    public function destroy(TShirt $tShirt)
    {
        //
    }
}
