@extends('layouts.layout')
<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>La cave à vins</title>

    <!-- Bootstrap Core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/animate.css" rel="stylesheet">
    <link href="assets/css/plugins.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="assets/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/pe-icons.css" rel="stylesheet">

</head>

<body id="page-top" class="regular-navigation">


    <div class="master-wrapper">

        <div class="preloader">
            <div class="preloader-img">
            	<span class="loading-animation animate-flicker"><img src="assets/img/loading.GIF" alt="loading" /></span>
            </div>
        </div>




        <!-- Header -->
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
                            <h2 class="section-heading">Vous êtes le <span class="theme-accent-color"> bienvenue</span> </h2>
                            <hr class="thin-hr">
                        </div>
                    </div>
                </div>

                <div>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-5 col-md-offset-1">
                                <h2 class="mb50">A propos <span class="theme-accent-color">de nous</span></h2>
                                <p class="lead">Nous sommes un catalogue français repertoriant les vins par région </p>
                            </div>

                            <div class="col-md-5">
                                <h2 class="mb50">Nos <span class="theme-accent-color">vin</span></h2>
                                <p class="lead">Les vins que nous proposons sont de type AOP ou IGP et de couleur rouge, blanc et rosé</p>
                            </div>
                        </div>
                    </div>

                </div>

            </div>



            
<section id="selection">
                    <div class="row">
                        <div class="col-md-6 wow fadeIn">
                            <h2 class="mb50"><span class="heading-font text-uppercase">Notre sélection AOC/AOP</span></h2>
                            <div class="food-menu-item">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <img src="assets/img/vins/Santenay_2013.png" class="img-responsive">
                                    </div>
                                    <div class="col-xs-9">
                                        <h3>Joseph Drouhin Santenay Rouge 2013  <span class="theme-accent-color"> 66.00€</span></h3>
                                        <p>Léger, fruité et de belles notes de fruits rouges</p>
                                        <td><a class="btn buttonmagique" href="{{route('wines.show',18)}}">Détails</a></td>
                                    </div>
                                </div>
                            </div>
                            <div class="food-menu-item">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <img src="assets/img/vins/Provence_blanc.png" class="img-responsive">
                                    </div>
                                    <div class="col-xs-9">
                                        <h3>Château Minuty, Cuvée Prestige, 2020  <span class="theme-accent-color"> 38.00€</span></h3>
                                        <p> Domaine Château Minuty </p>
                                        <td><a class="btn buttonmagique" href="{{route('wines.show',40)}}">Détails</a></td>
                                    </div>
                                </div>
                            </div>
                            <div class="food-menu-item">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <img src="assets/img/vins/Muscadet_blanc.png" class="img-responsive">
                                    </div>
                                    <div class="col-xs-9">
                                        <h3> Jo Landron, Amphibolite nature, 2019  <span class="theme-accent-color"> 16.20€</span></h3>
                                        <p>Avec des arômes d’agrumes citronnés, ce Muscadet exprime une pureté cristalline. Le fruit d’agrume éclate en bouche avec une sensation de fraîcheur et de richesse équilibrée par la minéralité saline et iodée puisée dans le terroir. L’élégance et la persistance de ce vin émanent d’une complexité harmonieuse. Avec 2019, l’Amphibolite atteint un niveau exceptionnel.</p>
                                        <td><a class="btn buttonmagique" href="{{route('wines.show',37)}}">Détails</a></td>
                                    </div>
                                </div>
                            </div>
                            <div class="food-menu-item">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <img src="assets/img/vins/Crémant_Alsace_Rosé.png" class="img-responsive">
                                    </div>
                                    <div class="col-xs-9">
                                        <h3> Arthur Metz D de Colmar - Crémant Alsace Rosé  <span class="theme-accent-color"> 7.00€</span></h3>
                                        <p>Crémant de grande qualité à consommer lors desapéritifs, cocktails et réceptions.</p>
                                        <td><a class="btn buttonmagique" href="{{route('wines.show',3)}}">Détails</a></td>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 wow fadeIn">
                            <h2 class="mb50"><span class="heading-font text-uppercase">Notre sélection IGP</span></h2>
                            <div class="food-menu-item">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <img src="assets/img/vins/Coiffy_rouge.png" class="img-responsive">
                                    </div>
                                    <div class="col-xs-9">
                                        <h3>Coteaux de Coiffy Rouge  <span class="theme-accent-color"> 5.55€</span></h3>
                                        <p>Des notes de sureau et de brioche accompagnent les fruits rouges et noirs pour composer une olfaction délicate. En bouche, le vin se révèle franc, droit, solide, sans manquer de chair ni de rondeur. L‘équilibre est là. </p>
                                        <td><a class="btn buttonmagique" href="{{route('wines.show',21)}}">Détails</a></td>
                                    </div>
                                </div>
                            </div>
                            <div class="food-menu-item">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <img src="assets/img/vins/Ariège_blanc.png" class="img-responsive">
                                    </div>
                                    <div class="col-xs-9">
                                        <h3> Vin de Pays de l‘Ariège  <span class="theme-accent-color"> 10.20€</span></h3>
                                        <p>Vignerons Indépendants, engagés dans la préservation de l’environnement depuis 1988 et certifiés « Haute Valeur Environnementale ». un vin tout en délicatesse et discrétion.</p>
                                        <td><a class="btn buttonmagique" href="{{route('wines.show',33)}}">Détails</a></td>
                                    </div>
                                </div>
                            </div>
                            <div class="food-menu-item">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <img src="assets/img/vins/Puy_Dome_rouge.png" class="img-responsive">
                                    </div>
                                    <div class="col-xs-9">
                                        <h3>Puy de Dôme IGP : vin rouge d‘Auvergne – Le Pinot Noir  <span class="theme-accent-color"> 8.40€</span></h3>
                                        <p>Ce vin cultive sa personnalité sur une terre volcanique unique au monde. Belle couleur profonde aux arômes de mûres et de cerises noires …</p>
                                        <td><a class="btn buttonmagique" href="{{route('wines.show',38)}}">Détails</a></td>
                                    </div>
                                </div>
                            </div>
                            <div class="food-menu-item">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <img src="assets/img/vins/LuizGarrigue_blanc.png" class="img-responsive">
                                    </div>
                                    <div class="col-xs-9">
                                        <h3>Luz Garrigue 2016 Lubéron - Vin blanc du Lubéron  <span class="theme-accent-color"> 7.49€</span></h3>
                                        <p>Nez délicat sur la pêche de vigne et la verveine. Bouche : L‘attaque est franche et évolue vers un vin d‘une belle minéralité. Finale longue et fraîche</p>
                                        <td><a class="btn buttonmagique" href="{{route('wines.show',48)}}">Détails</a></td>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>



        <div id="bottom-frame"></div>

        <a href="#" id="back-to-top"><i class="fa fa-long-arrow-up"></i></a>

    </div>

    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/init.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <script type="text/javascript">
    $(document).ready(function(){
       'use strict';
        jQuery('#headerwrap').backstretch([
          "assets/img/bg/selec1.png",
          "assets/img/bg/selec2.png",
          "assets/img/bg/selec3.png",
        ], {duration: 8000, fade: 500});
    });
    </script>

</body>

</html>
