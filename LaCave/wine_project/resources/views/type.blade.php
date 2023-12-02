@extends('layouts.layout')

@section('titrePage')
    Information sur le vin
@endsection

@section('titreItem')
    <h1 >Nos différents vin ...</h1>
@endsection
<link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/animate.css" rel="stylesheet">
    <link href="../assets/css/plugins.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../assets/css/style.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../assets/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="../assets/css/pe-icons.css" rel="stylesheet">

    <header id="headerwrap" class="backstretched fullheight">
            <div class="container-fluid fullheight">
                <div class="vertical-center row">
                <div class="fullheight " data-wow-delay="0.8s"><img src="../assets/img/bg/selec1.png"></div>    
                    <div class="col-sm-1 pull-left text-center slider-control match-height">
                        <a href="#" class="prev-bs-slide vertical-center wow fadeInLeft" data-wow-delay="0.8s"><i class="fa fa-long-arrow-left"></i></a>
                    </div>
                    <div class="intro-text text-center smoothie col-sm-10 match-height">                    
                        <div class="intro-heading wow fadeIn heading-font" data-wow-delay="0.8s"><img src="../assets/img/logo.png"></div>              
                    </div>
                    <div class="col-sm-1 pull-right text-center slider-control match-height">
                        <a href="#" class="next-bs-slide vertical-center wow fadeInRight" data-wow-delay="0.8s"><i class="fa fa-long-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </header>

@section('contenu')
<section id="selection" class="description-product">
<div class="card">
    <header class="card-header text-white">
        <h5 class="card-header-title">Nous avons sélectionné pour vous : </h5>
    </header>
    <div class="card-content">
        <div class="content">
            <table class="table is-hoverable description-product">
                <thead>
                    <th>#</th>
                    <th>Titre</th>
                </thead>
                @foreach ($type as $type)
                    <tr>
                        <td>{{ $type->Nom }}</td>
                        <td>{{ $type-> id }}</td>
                        <td><a class="btn buttonmagique" href="{{route('wines.show',$type->id)}}">Détails</a></td>
                    @endforeach
                    </tr>
            </table>
        
            <hr>
        </div>
    </div>
</section>
    @endsection
    