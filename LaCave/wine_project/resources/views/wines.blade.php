@extends('layouts.layout')

@section('contenu')

<header id="headerwrap" class="backstretched fullheight">
            <div class="container-fluid fullheight">
                <div class="vertical-center row">
                    <div class="col-sm-1 pull-left text-center slider-control match-height">
                        <a href="#" class="prev-bs-slide vertical-center wow fadeInLeft" data-wow-delay="0.8s"><i class="fa fa-long-arrow-left"></i></a>
                    </div>
                    <div class="intro-text text-center smoothie col-sm-10 match-height">                    
                        <div class="intro-heading wow fadeIn heading-font" data-wow-delay="0.8s"><img src="assets/img/logo.png"></div>              
                    </div>
                    <div class="col-sm-1 pull-right text-center slider-control match-height">
                        <a href="#" class="next-bs-slide vertical-center wow fadeInRight" data-wow-delay="0.8s"><i class="fa fa-long-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </header>


<section id="about" class="top-border-me">
            <div class="section-inner">

                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 text-center mb100">                        
                            <h2 class="section-heading">Tous nos<span class="theme-accent-color">vins</span> </h2>
                        <a href="{{route('wines.create')}}" class="btn btn-warning"> Ajouter une recommandation </a>
                        @if(session()->has('info'))
                        <div class="card text-white bg-success mb-3" style="max-width: 18rem">
                            <div class="card-body">
                                <p class="card-text">{{ session('info')}}</p>
                            </div>
                        </div>
                      @endif
                            <hr class="thin-hr">
                        </div>
                    </div>
                </div>

            </div>
        <div class="card-content ">
            <div class="content align-item-center">
                <table class="table is-hoverable  justify-content-center">
                    <thead>
                    <th>Nom</th>
                    <th>Producteur</th>
                    <th>Type</th>
                    <th>Prix</th>
                    <th>Image</th>
                     </thead>
                @foreach($wines as $wine)
                    <tr>
                        <td>{{ $wine->id }}</td>
                        <td>{{ $wine->Nom}}</td>
                        <td>{{ $wine->producteur->nom }}</td>
                        <td>{{ $wine->type->type }}</td>
                        <td>{{$wine->Image}}</td>
                        <td> <img src='../public/images/{{$wine->Image}}.png'  style="width: 55px;"></td>

                        <td><a class="btn btn-primary" href="{{route('wines.show',$wine->id)}}">Détails</a></td>
                        
                    </tr>
                @endforeach
            </table>

        </div>
    </div> 
</div>

    </section>
        


@endsection