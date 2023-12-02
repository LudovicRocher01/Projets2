<!DOCTYPE php>
<?php
  require_once "php/appelBD.php" ;
  require_once "php/Fonctions.php";
  session_start();
  try{
    $undlg = new appelBD();
    $cat = $undlg->getCategories();
	$montant=$_GET["montant"];
	$_SESSION['montanttot'] = $montant;
  } catch (Exception $e) {
    $erreur = $e->getMessage();
  }
?>

<head>
		<meta charset="utf-8" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
		<link rel="stylesheet" href="css/formatstyle.css" />
    <title>Paiement ISIWEB4SHOP</title>
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
        <section>
		<?php
		echo "<H1>Montant total du pannier : ".htmlspecialchars($montant)." €</H1>";
		?>
    <br>
<span class="text-center">
		</br>
		<h1>ETAPE 1/2 : Coordonnéess</h1>
		</br>

    <form name="infos" method="post">
    <img class="photologo" src="images/ISI WEB 4 SHOP logo.png">

			<fieldset class="formulaire">
			  <div class="obligatoire">
				<label for="Forname">Prenom :</label>
				<input type="text" name="Firstname" value="<?php echo "{$_SESSION['customer']['forname']}"; ?>" required>
			  </div>
			  <br>
			  <div class="obligatoire">
				<label for="Surname">Nom :</label>
				<input type="text" name="Surname" value="<?php echo "{$_SESSION['customer']['surname']}"; ?>" required>
			  </div>
			  <br>
			  <div class="obligatoire">
				<label for="Adress1">Adress1 :</label>
				<input type="text" name="Adress1" value="<?php echo "{$_SESSION['customer']['add1']}"; ?>" required>
			  </div>
			  <br>
			  <div class="falcutatif">
				<label for="Adress2">Adress2 :</label>
				<input type="text" name="Adress2" value="<?php echo "{$_SESSION['customer']['add2']}"; ?>">
			  </div>
			  <br>
			  <div class="obligatoire">
				<label for="Ville">Ville :</label>
				<input type="text" name="Ville" value="<?php echo "{$_SESSION['customer']['add3']}"; ?>" required>
			  </div>
			  <br>
			  <div class="obligatoire">
				<label for="PostCode">Code postale :</label>
				<input type="text" name="PostCode" value="<?php echo "{$_SESSION['customer']['postcode']}"; ?>" required>
			  </div>
			  <br>
			  <div class="obligatoire">
				<label for="Phone">Telephone :</label>
				<input type="text" name="Phone" value="<?php echo "{$_SESSION['customer']['phone']}"; ?>" required>
			  </div>
			  <br>
			  <div class="obligatoire">
				<label for="Email">Email :</label>
				<input type="text" name="Email" value="<?php echo "{$_SESSION['customer']['email']}"; ?>" required>
			  </div>
			</fieldset></br>
     <!-- <input class="barre" type="submit" name="infos" value="Etape suivante : Paiement" /> -->

      <?php
      echo "<input type='submit' name='infos' style='color:black'  value='Etape suivante : Paiement'>";
      ?>

      </form>
		  

		</br></br></br>
		<?php

		if(isset($_POST['infos']))
		  {
        try {
          $address =$undlg->getAdressesbis($_POST['Forname'], $_POST['Surname'], $_POST['Adress1'], $_POST['Adress3'], $_POST['Phone']);
          if ($address == NULL) {
            $undlg->addAdress($_POST['Forname'], $_POST['Surname'], $_POST['Adress1'], $_POST['Adress2'], $_POST['Adress3'], $_POST['PostCode'], $_POST['Phone'], $_POST['Email']);
            $address =$undlg->getAdressesbis($_POST['Forname'], $_POST['Surname'], $_POST['Adress1'], $_POST['Adress3'], $_POST['Phone']);
          }
          $undlg->newOrder($_SESSION['customer']['id'], 1, $address["id"], "" ,MontantGlobal());
          $_SESSION["order"]=$undlg->getOrder($_SESSION['customer']['id'], $address["id"]);
          for($i = 0; $i < compterArticles(); $i++){
            $undlg->newOrderItem($_SESSION['order']['id'], $_SESSION["panier"]['id'][$i], $_SESSION["panier"]['qteProduit'][$i]);
          }
        } catch (\Exception $e) {
          $erreur = $e->getMessage();
        }
        header('Location: \"".htmlspecialchars("paiement2.php?montant=".rawurlencode(MontantGlobal()))."\"');
		  }

		?>
          </section>
<br>

        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Rocher Ludovic - Even Antoine</p></div>
        </footer>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>