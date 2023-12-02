<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProducteurRequest;
use App\Http\Requests\UpdateProducteurRequest;
use App\Models\Producteur;

class ProducteurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $producteurs = Producteur::all();
        return view('producteurs', compact('producteurs'));
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
     * @param  \App\Http\Requests\StoreProducteurRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProducteurRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producteur  $producteur
     * @return \Illuminate\Http\Response
     */
    public function show(Producteur $producteur)
    {
        //
        $producteur= $producteur->wines;
        return view('producteur',compact('producteur'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producteur  $producteur
     * @return \Illuminate\Http\Response
     */
    public function edit(Producteur $producteur)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProducteurRequest  $request
     * @param  \App\Models\Producteur  $producteur
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProducteurRequest $request, Producteur $producteur)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producteur  $producteur
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producteur $producteur)
    {
        $producteur->delete(); 
        return back()-> with('info','le producteur a bien été supprimé de la base de données');
    }
}
