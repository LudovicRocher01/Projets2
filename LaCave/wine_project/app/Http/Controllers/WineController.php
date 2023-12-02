<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWineRequest;
use App\Http\Requests\UpdateWineRequest;
use App\Http\Requests\InsertWineRequest;
use App\Models\Wine;


class WineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wines = Wine::all();
        return view('wines', compact('wines'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreWineRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InsertWineRequest $request)
    {
        //
        Wine::create($request->all());
        return redirect('/wines')-> with('info','le vin a bien été ajouté de la base de données');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Wine  $wine
     * @return \Illuminate\Http\Response
     */
    public function show(Wine $wine)
    {
        $producteur = $wine->producteur;
        $type = $wine->type; 
        $path = '../public/images/' .$wine->image; 
        return view('wine',compact('wine','type','producteur','path'));
    }


    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Wine  $wine
     * @return \Illuminate\Http\Response
     */
    public function edit(Wine $wine)
    {
        //
        return view('edit',compact('wine'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateWineRequest  $request
     * @param  \App\Models\Wine  $wine
     * @return \Illuminate\Http\Response
     */
    public function update(InsertWineRequest $request, Wine $wine)
    {
           //
           $wine ->update($request->all());
           return redirect('/wines')-> with('info','le vin a bien été modifié de la base de données');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Wine  $wine
     * @return \Illuminate\Http\Response
     */
    public function destroy(Wine $wine)
    {
        // 
        $wine->delete();
        return redirect('/wines')-> with('info','le vin a bien été supprimé de la base de données');
    }
}
