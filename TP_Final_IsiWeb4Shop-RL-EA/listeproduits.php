<!DOCTYPE php>
<?php

  session_start();
  require_once "php/appelBD.php" ;
  if(!isset($_SESSION['connected'])){
    $_SESSION['connected'] = true;
  }
  try{
    $undlg = new appelBD();
    $cat = $undlg->getCategories();
    $product = $undlg->getProducts($_GET['catId']);
    $categorie = $_GET['catName'];
  } catch (Exception $e) {
    $erreur = $e->getMessage();
  }
  if(isset($_GET["id"])){
  addPanier(intval($_GET["id"]));
  }

?>

<head>
		<meta charset="utf-8" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
		<link rel="stylesheet" href="css/formatstyle.css" />
    <title>Liste de produits ISIWEB4SHOP</title>
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

				</ul>
		</nav>
  
    
    <nav class="product-filter">

<?php
          echo "<h1> Nos $categorie : </h1>";
?>

</nav>

<section class="products">
  
  <?php   
            for ($i=0; $i < count($product); $i++) {
              echo "<tr>";
              echo "  <div class='product-card'><td><a href=\"produit.php?catId={$product[$i]["id"]}&catName={$product[$i]["name"]}&catPrice={$product[$i]["price"]}&catDescription={$product[$i]["description"]}&catImage={$product[$i]["image"]}&catQuantity={$product[$i]["quantity"]}\"><img class='product-image' src=\"productimages/{$product[$i]["image"]}\" alt=\"image du produit {$product[$i]["name"]}\"></a></td><td class='product-info'> <h5>{$product[$i]["name"]}</h5></td><td class='product-info'><h6>{$product[$i]["price"]}‎€</h6></td></div>";
              echo "</tr>";
            }
  ?>
    
</div>
</section>
  

<br>


<footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Rocher Ludovic - Even Antoine</p></div>
        </footer>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>