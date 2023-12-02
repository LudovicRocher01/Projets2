<!DOCTYPE php>
<?php 

  require_once "php/appelBD.php" ;
  require_once "php/fonctions.php" ;
  session_start();

  try{
    $undlg = new appelBD();
    creationPanier();
    $cat = $undlg->getCategories();
  } catch (Exception $e) {
    $erreur = $e->getMessage();
  }
  
  if (isset ($_GET["action"]))
  {
  	if ($_GET["action"]=="ajout")
  		ajouterArticle($_GET["id"],$_GET["image"],$_GET["l"],$_GET["q"],$_GET["p"]);

  	if ($_GET["action"]=="suppression")
  		supprimerArticle($_GET["l"]);
    
      if ($_GET["action"]=="suppressionun")
  		supprimerUnArticle($_GET["id"],$_GET["image"],$_GET["l"],$_GET["q"],$_GET["p"]);

  	if ($_GET["action"]=="reinit")
  	{
  		supprimePanier();
  		creationPanier();
  	}

  	unset ($_GET["action"]);
  }
  



echo '<?xml version="1.0" encoding="utf-8"';

?>

<head>
		<meta charset="utf-8" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
		<link rel="stylesheet" href="css/formatstyle.css" />
    <title>Panier ISIWEB4SHOP</title>
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
           

        <span class="text-center">

        <form method="post" action="panier.php">
<table class="panier">
    <caption><h2>Votre pannier :</h2></caption>
    <tr>
		<th>Image</td>
        <th>Libellé</td>
        <th>Quantité</td>
        <th>Prix Unitaire</td>
        <th>Action</td>
    </tr>


    <?php
		$nbArticles=count(array_filter($_SESSION['panier']['libelleProduit'], function($x) { return !empty($x); }));
		$nbArticlestot=count($_SESSION['panier']['libelleProduit']);
        if ($nbArticles <= 0)
        echo "<tr><td colspan=\"5\">Votre panier est vide </ td></tr>";
        else
        {
            for ($i=0 ;$i < $nbArticlestot ; $i++) {
				if (!empty($_SESSION['panier']['libelleProduit'])) {

                echo "<tr>";
				echo "<td><img class='avatar' src=\"productimages/"."{$_SESSION['panier']['image'][$i]}"."\" alt=\"image du produit\"></ td>";
                echo "<td>".htmlspecialchars($_SESSION['panier']['libelleProduit'][$i])."</ td>";

                echo "<td><a class='product-info' style='color:black' href=\"".htmlspecialchars("panier.php?image=".rawurlencode($_SESSION['panier']["image"][$i])."&action=suppressionun&l=".rawurlencode($_SESSION['panier']['libelleProduit'][$i])."&q=1&p=".rawurlencode($_SESSION['panier']['prixProduit'][$i]))."\" \">-</a>";
                echo "<span class='qté'>".htmlspecialchars($_SESSION['panier']['qteProduit'][$i])."</span>";
                echo "<a class='product-info' style='color:black' href=\"".htmlspecialchars("panier.php?image=".rawurlencode($_SESSION['panier']["image"][$i])."&action=ajout&l=".rawurlencode($_SESSION['panier']['libelleProduit'][$i])."&q=1&p=".rawurlencode($_SESSION['panier']['prixProduit'][$i]))."\" \">+</a></td>";

 
                echo "<td>".htmlspecialchars($_SESSION['panier']['prixProduit'][$i])."€</td>";
                echo "<td><a class='product-info' style='color:black' href=\"".htmlspecialchars("panier.php?action=suppression&l=".rawurlencode($_SESSION['panier']['libelleProduit'][$i]))."\">Supprimer Article</a></br></br>";


				echo "</td>";
                echo "</tr>";
				}
			}
            echo "<tr><td colspan=\"2\"> </td>";
            echo "<td colspan=\"3\">";
            echo "Total du pannier : ".MontantGlobal()."€";
            echo "</td></tr>";
            echo "<tr><td colspan=\"5\"></td></tr>";
            echo "<tr>";
			      echo "<td></td>";
            echo "<td class=\"barre\"><a class='product-info' style='color:black' href=\"".htmlspecialchars("panier.php?action=reinit")."\"><h2>Supprimer le panier</h2></a>";

			echo "</td>";
      echo "<td></td>";


      echo "<td class=\"barre\"><a class='product-info' style='color:black' href=\"".htmlspecialchars("paiement.php?montant=".rawurlencode(MontantGlobal()))."\"><h2>Payer</h2></a>";

			echo"</tr>";
        }
       
        ?>

    
</table>
</form>

<br>

        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Rocher Ludovic - Even Antoine</p></div>
        </footer>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>