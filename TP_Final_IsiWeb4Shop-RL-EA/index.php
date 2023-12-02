<!DOCTYPE php>
<?php

  session_start();
  require_once "php/appelBD.php" ;
  require_once "php/fonctions.php" ;
  if(!isset($_SESSION['connected'])){
    $_SESSION['connected'] = true;
  }
  try{
    $undlg = new appelBD();
    $cat = $undlg->getCategories();
  } catch (Exception $e) {
    $erreur = $e->getMessage();
  }

?>

<head>
		<meta charset="utf-8" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
		<link rel="stylesheet" href="css/formatstyle.css" />
    <title>Page d'acceuil ISIWEB4SHOP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <script src="js/javascrip.js"> </script>
</head>

<body>
  <header>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#!"> </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php">Accueil</a></li>
                        <li class="nav-item"><a class="nav-link" href="commentaire.php">A propos</a></li>
                        <?php
                        if(!isset($_SESSION['customer']) && !isset($_SESSION['admin'])){
                          echo '<li class="nav-item"><a class="nav-link" href="authentification.php">Connexion</a></li>';
                          echo '<li class="nav-item"><a class="nav-link" href="inscription.php"> Inscription </a></li>';
                        }
                        ?>
                        

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Catégories</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            
                            <?php
                            for($i = 0; $i < count($cat); $i++) {
            echo "<li><a class='dropdown-item' href=\"listeproduits.php?catId={$cat[$i]["id"]}&catName={$cat[$i]["name"]}\"> {$cat[$i]["name"]}</a></li>";
          }
          ?>
                            </ul>
                        </li>
                        
                        <a class="nav-link" href="inscription.php">
                    

                        <?php 
      if(isset($_SESSION['customer']) && $_SESSION['customer'] != null){
        echo "<a href=\"deconnexion.php\"><li class='nav-item'><span class='nav-link active' aria-current='page'>{$_SESSION["customer"]["forname"]} {$_SESSION["customer"]["surname"]} : Mon Compte </span></li></a>";
      }
      if(isset($_SESSION['admin']["username"])){
        echo "<a href=\"deconnexion.php\"><li class='nav-item'><span class='nav-link active' aria-current='page'>{$_SESSION["admin"]["username"]} : Mon Compte </span></li></a>";
        echo "<a  href=\"commandes.php\"><li class='nav-item'><span class='nav-link active' aria-current='page'>Acceder au commandes</span></li></a>";
      } 
       ?>
       </a>
       </ul>

       <form class="d-flex">
       <button class="btn btn-outline-dark" type="submit">
       <i class="bi-cart-fill me-1"></i>
         <a class="badge bg-dark text-white ms-1 rounded-pill" href="panier.php"> Voir panier / Payer </a>
    </button>
    </form>

                  </div>
            </div>
        </nav>
    </header>
        
        <header class="bg-dark py-3">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">Isi Web 4 Shop</h1>
                    <p class="lead fw-normal text-white-50 mb-0">Garantie ingrédients de qualité</p>
                </div>
            </div>
        </header>
        
        <section class="py-5 bg-light">
            <div class="container px-4 px-lg-5 mt-5">
                <h2 class="fw-bolder mb-4">Nos meilleures ventes du moment</h2>
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    
                
                <div class='product-card'>
                    <a href="http://localhost:8888/TP_Final_IsiWeb4Shop-RL-EA/produit.php?catId=5&catName=Biscuits%20de%20No%C3%ABl&catPrice=10.50&catDescription=De%20doux%20biscuits%20de%20No%C3%ABl%20%C3%A0%20la%20cannelle,%20au%20chocolat,%20et%20sabl%C3%A9s%20pour%20assurer%20de%20belles%20et%20uniques%20f%C3%AAtes%20de%20No%C3%ABl&catImage=biscuitNoel2.png&catQuantity=3">
                        <img class="product-image" src="productimages/biscuitNoel2.png"></a>
                        <span class='product-info'> <h5>Biscuits de Noël </h5></td>
                         <span class='product-info'><h6>10,50‎€</h6></div>


                         <div class='product-card'>
                    <a href="http://localhost:8888/TP_Final_IsiWeb4Shop-RL-EA/produit.php?catId=22&catName=Th%C3%A9%20vert&catPrice=13.90&catDescription=20%20sachets%20de%20th%C3%A9%20vert.%20Les%20adeptes%20en%20raffolent%20et%20on%20comprend%20bien%20pourquoi%20!%20&catImage=theVert.jpg&catQuantity=13">
                        <img class="product-image" src="productimages/theVert.jpg"></a>
                        <span class='product-info'> <h5>Thé vert </h5></td>
                         <span class='product-info'><h6>13,90‎€</h6></div>

                    

                         <div class='product-card'>
                    <a href="http://localhost:8888/TP_Final_IsiWeb4Shop-RL-EA/produit.php?catId=17&catName=Sachet%20de%20caf%C3%A9%20en%20grain&catPrice=15.00&catDescription=sachet%20d%27un%20kilogramme%20de%20caf%C3%A9%20en%20grain,%20pour%20garder%20l%27authentique%20go%C3%BBt%20du%20caf%C3%A9%20pour%20bien%20commencer%20la%20journ%C3%A9e&catImage=cafeGrain.jpg&catQuantity=10">
                        <img class="product-image" src="productimages/cafeGrain.jpg"></a>
                        <span class='product-info'> <h5>Sachet de café en grain  </h5></td>
                         <span class='product-info'><h6>15,00‎€</h6></div>

                         <div class='product-card'>
                    <a href="http://localhost:8888/TP_Final_IsiWeb4Shop-RL-EA/produit.php?catId=9&catName=Plateau%20de%20fruits%20secs%20&catPrice=32.00&catDescription=Plateau%20de%201kg%20compos%C3%A9%20d%27abricots%20secs,%20de%20noix%20de%20cajous,%20pruneaux%20secs,%20bananes%20s%C3%A8ches,%20copeaux%20de%20noix%20de%20coco...&catImage=plateauFruitsSecs.jpg&catQuantity=6">
                        <img class="product-image" src="productimages/plateauFruitsSecs.jpg"></a>
                        <span class='product-info'> <h5>Plateau de fruits secs </h5></td>
                         <span class='product-info'><h6>32,00€</h6></div>
                    </section>





<br>

        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Rocher Ludovic - Even Antoine</p></div>
        </footer>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    </body>
</html>