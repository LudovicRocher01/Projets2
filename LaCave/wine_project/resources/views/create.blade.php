@extends('layouts.layout')
<link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/animate.css" rel="stylesheet">
    <link href="../assets/css/plugins.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../assets/css/style.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../assets/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="../assets/css/pe-icons.css" rel="stylesheet">

    <header id="headerwrap" >
            <div class="container-fluid">
                <div class="vertical-center row">
                    <div class="col-sm-1 pull-left text-center">
                        <a href="#" class="prev-bs-slide vertical-center wow fadeInLeft" data-wow-delay="0.8s"><i class="fa fa-long-arrow-left"></i></a>
                    </div>
                    <div class="intro-text text-center smoothie col-sm-10 ">                    
                        <div class="intro-heading wow fadeIn heading-font" data-wow-delay="0.8s"><img src="../assets/img/logo.png"></div>              
                    </div>
                    <div class="col-sm-1 pull-right text-center ">
                        <a href="#" class="next-bs-slide vertical-center wow fadeInRight" data-wow-delay="0.8s"><i class="fa fa-long-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </header>

    <section id="about" class="top-border-me">
            <div class="section-inner">

                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 text-center ">                        
                            <h2 class="section-heading">ajouter une <span class="theme-accent-color"> bouteille</span> </h2>
                        </div>
                    </div>
                </div>
        </section>
<br>
    <div class="container">
        <div class="row card text-white bg-dark">
            <h4 class="card-title">Ajouter une recommandation de vin </h4>
            <div class="card-body">
                <form action="{{route('wines.store')}}" method="POST">
                    @csrf
                    <br>
                    <div class="form-group">
                        <input type="text" class="form-control @error('Nom') is-invalid @enderror" name="Nom" id="Nom" placeholder="Nom de la bouteille">
                        @error('Nom')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <br>
                    <div class="form-group">
                        <input type="text" class="form-control @error('Description') is-invalid @enderror" name="Description" id="Description" placeholder="Description du vin ">
                        @error('Description')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <br>
                    <div class="form-group">
                        <input type="text" class="form-control @error('Degre_alcool') is-invalid @enderror" name="Degre_alcool" id="Degre_alcool" placeholder="Degré d'alcool">
                        @error('Degre_alcool')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <br>
                    <div class="form-group">
                        <input type="text" class="form-control @error('type_id') is-invalid @enderror" name="type_id" id="type_id" placeholder="type id">
                        @error('type_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <br>
                    <div class="form-group">
                        <input type="text" class="form-control @error('producteur_id') is-invalid @enderror" name="producteur_id" id="producteur_id" placeholder="Producteur id">
                        @error('producteur_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <br>
                    <div class="form-group">
                        <input type="text" class="form-control @error('Prix_vin') is-invalid @enderror" name="Prix_vin" id="Prix_vin" placeholder="Prix du vin">
                        @error('Prix_vin')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <br>
                    <div class="form-group">
                        <input type="text" class="form-control" name="Image" id="Image" placeholder="Image">
                    </div>
                    <br>
                    <button type="submit" class="btn btn-secondary ">Envoyer !</button>
                </form>
            </div>
        </div>
    </div>


