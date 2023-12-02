@extends('layouts.layout')


@section('contenu')


<section id="about" class="top-border-me">
            <div class="section-inner">

                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 text-center mb100">                        
                            <h2 class="section-heading">Tous nos <span class="theme-accent-color"> Producteur</span> </h2>
                            <hr class="thin-hr">
                        </div>
                    </div>
                </div>

            </div>
        <div class="card-content ">
            <div class="content align-item-center">
                <table class="table is-hoverable  ">
                    <thead>
                    <th>Nom</th>
                    <th>Producteur</th>
                    <th>Description</th>
                     </thead>
                    @foreach ($producteurs as $producteur)
                    <tr>    
                        <td>{{ $producteur->nom }}</td>
                        <td>{{ $producteur->region }}</td>
                        <td>{{ $producteur-> information }}</td>
                    <tr>

                    </tr>
                        <td><a class="btn btn-primary" href="{{route('producteurs.show',$producteur->id)}}">Leurs Vins</a></td>                       
                    </tr>
                    @endforeach

            </table>
            
        </div>
    </div> 
</div>
</section>
@endsection
    