@extends('layouts.layout')
<link href="../../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../assets/css/animate.css" rel="stylesheet">
    <link href="../../assets/css/plugins.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../../assets/css/style.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../assets/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="../assets/css/pe-icons.css" rel="stylesheet">
<br>
<br>
    <section id="about" class="top-border-me">
            <div class="section-inner">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 text-center ">                        
                            <h2 class="section-heading">Modifier une <span class="theme-accent-color"> bouteille</span> </h2>
                        </div>
                    </div>
                </div>
        </section>
<br>
    <div class="container">
        <div class="row card text-white ">
            <h4 class="card-title">Modifier les informations sur la bouteille</h4>
            <div class="card-body text-white">
                <form action="{{route('wines.update',$wine->id)}}" method="post">
                @csrf
                @method('PUT')
                    <br>
                    <div class="form-group">
                        <input type="text" class="form-control @error('Nom') is-invalid @enderror text-white" name="Nom" id="Nom" value="{{old('Nom',$wine->Nom)}}" placeholder="Nom de la bouteille">
                        @error('Nom')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <br>
                    <div class="form-group">
                        <input type="text" class="form-control @error('Description') is-invalid @enderror" name="Description" id="Description" value="{{old('Description',$wine->Description)}}" placeholder="Description du vin ">
                        @error('Description')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <br>
                    <div class="form-group">
                        <input type="text" class="form-control @error('Degre_alcool') is-invalid @enderror" name="Degre_alcool" id="Degre_alcool" value="{{old('Degre_alcool',$wine->Degre_alcool)}}" placeholder="Degré d'alcool">
                        @error('Degre_alcool')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <br>
                    <div class="form-group">
                        <input type="text" class="form-control @error('type_id') is-invalid @enderror" name="type_id" id="type_id" value="{{old('type_id',$wine->type_id)}}" placeholder="type id">
                        @error('type_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <br>
                    <div class="form-group">
                        <input type="text" class="form-control @error('producteur_id') is-invalid @enderror" name="producteur_id" id="producteur_id"  value="{{old('producteur_id',$wine->producteur_id)}}"  placeholder="Producteur id">
                        @error('producteur_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <br>
                    <div class="form-group">
                        <input type="text" class="form-control @error('Prix_vin') is-invalid @enderror" name="Prix_vin" id="Prix_vin" value="{{old('Prix_vin',$wine->Prix_vin)}}" placeholder="Prix du vin">
                        @error('Prix_vin')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <br>
                    <div class="form-group">
                        <input type="text" class="form-control" name="Image" id="Image" value="{{old('Image',$wine->Image)}}" placeholder="Image">
                    </div>
                    <br>
                    <center><button type="submit" class="btn btn-secondary  ">Envoyer !</button> <center>
                </form>
            </div>
        </div>
    </div>



