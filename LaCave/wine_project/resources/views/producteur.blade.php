@extends('layouts.layout')

<link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/animate.css" rel="stylesheet">
    <link href="../assets/css/plugins.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../assets/css/style.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../assets/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="../assets/css/pe-icons.css" rel="stylesheet">

@section('contenu')
<br>
<br>
<section id="about">
<div class="card">
    <header class="card-header">
        <h5 class="card-header-title">Nous avons sélectionné pour vous : </h5>
    </header>
    <div class="card-content">
        <div class="content">
            <table class="table is-hoverable">
                <thead>
                    <th>Nom du vin</th>
                    <th>Description</th>
                    <th></th>
                </thead>
                    @foreach ($producteur as $producteur)
                    <tr>
                        <td>{{ $producteur->Nom }}</td>
                        <td>{{ $producteur->Description }}</td>
                        <td><a class="btn btn-primary" href="{{route('wines.show',$producteur->id)}}">Détails</a></td>
                    </tr>
                    @endforeach
            </table>
            <hr>
        </div>
    </div>
</section >
    @endsection
    