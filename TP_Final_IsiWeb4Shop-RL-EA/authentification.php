<!DOCTYPE php>
<?php

  session_start();
  require_once "php/appelBD.php" ;
  require_once "php/fonctions.php" ;
  $_SESSION['connected'] = false;
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
    <title>Authentification ISIWEB4SHOP</title>
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


    <span class="text-center">

<section>
<img class="photologo" src="images/ISI WEB 4 SHOP logo.png">
			<article>
				<div class="connexion">
      <h1><strong>S'identifier :</strong></h1><br>
      <form name="connexion" method="post">
        <fieldset class="formulaire">
          <div class="obligatoire">
            <label for="Identifiant"> Identifiant :</label>
            <input type="text" autocomplete="off" name="Identifiant" placeholder="Entrez votre Nom d'Utilisateur"  required>
          </div>
          <br>
          <div class="obligatoire">
            <label for="Password">Mot de Passe :</label>
            <input type="password" autocomplete="off" name="Password" placeholder="Entrez votre Mot de Passe"  required>
          </div>
        </fieldset></br>
        <input type="submit" class="btn btn-lg btn-primary" name="Connexion" value="Connexion" /><br><br>
        <a href="inscription.php"><button type="button" class="btn btn-warning">Pas encore inscrit !?<br> Inscrivez-vous</button> </a><br>
      </form>

    </span>

      <?php
      
      if(isset($_POST['Connexion']))
      {
        try
        {
          
           $undlg = new appelBD();
           $admin =  $undlg->getAdmin($_POST['Identifiant'], $_POST['Password']);
           if(empty($admin['username'])){
             $utilisateur = $undlg->getLogin($_POST['Identifiant'], $_POST['Password']);
             $customer = $undlg->getCustomer($utilisateur['customer_id']);
             $_SESSION['customer'] = $customer;
             $_SESSION['admin'] = null;
             
           }
           else{
             $_SESSION['admin'] = $admin;
             $_SESSION['customer'] = null;
           }
         }
         catch (Exception $e)
         {
           $erreur = $e->getMessage();
         }
        if(isset($_SESSION['customer']['forname']) && isset($_SESSION['customer']['surname']))
        {
          foreach ($customer as $key => $value) {
            $_SESSION[$key] = $value;
          }
          header('Location: deconnexion.php');
        }
        elseif(isset($_SESSION['admin']['username'])){
          header('Location: deconnexion.php');
        }
        else
        {
            echo"<p class='rouge'> Nom d'utilisateur ou Mot de Passe incorrect !</p>";
        }

      }

    ?>
       
    

    </div>
    </article>
    </section>
<br>


        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Rocher Ludovic - Even Antoine</p></div>
        </footer>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>