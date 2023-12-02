@extends('layouts.layout')


<!DOCTYPE html>
    <!-- Bootstrap Core CSS -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/animate.css" rel="stylesheet">
    <link href="../assets/css/plugins.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../assets/css/style.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../assets/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="../assets/css/pe-icons.css" rel="stylesheet">

  </head>

  <body>

  <header id="headerwrap" class="backstretched fullheight">
            <div class="container-fluid fullheight">
                <div class="vertical-center row">
                <div class="fullheight " data-wow-delay="0.8s"><img src="../assets/img/bg/selec1.png"></div>      
                    <div class="intro-text text-center smoothie col-sm-10 match-height">                    
                          <img src="../assets/img/logo.pn"g  style="width: 10px;"></div>              
                    </div>
                    <div class="col-sm-1 pull-right text-center slider-control match-height">
                        <a href="#" class="next-bs-slide vertical-center wow fadeInRight" data-wow-delay="0.8s"><i class="fa fa-long-arrow-right"></i></a>       
                    </div>
                </div>
            </div>
        </header>
<br>
  <section class="py-5">
            <div class="container px-4 px-lg-5 my-5">
              <br><br>
                <div class="row gx-4 gx-lg-5 align-items-center">
                    <img class='photovin' src='../../public/images/{{$wine->Image}}.png'>

                    <div class="col-md-6">
                      
                    
                     
                      <h1 class='display-5 fw-bolder'> {{$wine->Nom}} </h1>
                       <h1 class='display-6 fw-bolder'> {{$wine->Prix_vin}}€ - Vin {{$wine->type->type}} </h1>
                       <p class='lead'> {{$wine->Description}} </p> <br><br><br><br><h3><a href="../wines" class="cart-btn"> Retour Catalogue</a></h3>
                       <br>
                      <br>
                
                       @auth
                            <form action="{{ route('wines.destroy',$wine->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Supprimer</button>
                            </form>
                            <br>
                            <br>
                        <button class="btn btn-warning" href="{{route('wines.edit',$wine->id)}}">Modifier</button>
                        @endauth
                       
                       
                    </div>
                    
                </div>
            </div>
  </section>


    <main class="container">

      <!-- Left Column / Headphones Image -->
      <div class="left-column contain">
      </div>


      <!-- Right Column -->
      <div class="right-column">

        <!-- Product Description -->
        <div class="product-description">
          <h1>{{$wine->Nom}}</h1>
          <p>{{$wine->Description}}</p>
        </div>

        <!-- Product Configuration -->
        <div class="product-configuration">

          <!-- Product Color -->
          <div class="product-color">
            <span>Informations</span>

            <div class="color-choose">
              <div>
                <p>Degrés: {{$wine->Nom}} cl.</p>
                <p>type: {{$wine->type->type}}</p>
              </div>
            </div>

          </div>

          <!-- Cable Configuration -->
          <div class="cable-config">

          </div>
        </div>
        <div class="product-price">
          <span>{{$wine->Prix_vin}}€</span> <br>
          <a href="../wines" class="cart-btn">Retour à la liste</a>
        </div>
      </div>
    </main>

    </script>

  </body>
</html>   