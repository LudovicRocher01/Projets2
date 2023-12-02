@extends('layouts.layout')

@section('titrePage')
    Liste des mangas
@endsection



@section('contenu')
@if(session()->has('info'))
    <div class="card text-white bg-success mb-3" style="max-width: 18rem">
        <div class="card-body">
            <p class="card-text">{{ session('info')}}</p>

        </div>
    </div>
@endif
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
<section id="selection" class="description-product">
<br><br>
<center><h2 class="section-heading">Selon votre <span class="theme-accent-color">préférence</span> </h2>
 <h2>A vous de choisir</h2></center>
   <br><br>
                <table class="table is-hoverable  justify-content-center">
                <thead>
                    <th> </th>
                    <th> </th>
                    <th> </th>
                    <th> </th>
                </thead>
                     @foreach($types as $type)
                    <tr>
                        <td></td>
                        <td> Un vin {{ $type->type}} d'appelation {{ $type->appelation }}</td>
                        <td><a class="btn btn-primary" href="{{route('type.show',$type->id)}}">Voir</a></td>

                    </tr>
                @endforeach

            </table>
            
        </div>
    </div> 
</div>

    </section>

@endsection