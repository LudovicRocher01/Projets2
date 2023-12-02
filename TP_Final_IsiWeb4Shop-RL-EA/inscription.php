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
    <title>Inscription ISIWEB4SHOP</title>
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
        echo "<a href=\"deconnexion.php\"><li class='nav-item'><span class='nav-link active' aria-current='page'>{$_SESSION["customer"]["forname"]} {$_SESSION["customer"]["surname"]} : Mon compte </span></li></a>";
      }
      if(isset($_SESSION['admin']["username"])){
        echo "<a href=\"deconnexion.php\">{$_SESSION["admin"]["username"]}</a>";
        echo "<a  href=\"commandes.php\">Acceder au commandes</a>";
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

            <br>
  <form>
    <img class="photologo" src="images/ISI WEB 4 SHOP logo.png">
    <h1 class="h3 mb-3 fw-normal">Bienvenue ! Merci de vous enregistrer en entrant les données suivantes :</h1>

    <form name="Inscription" method="post">
    <fieldset class="formulaire">
      <div class="obligatoire">
        <label for="Forname">Prenom :</label>
        <input type="text" name="Forname" placeholder="Entrez votre Prénom" required>
      </div>
      <br>
      <div class="obligatoire">
        <label for="Surname">Nom :</label>
        <input type="text" name="Surname" placeholder="Entrez votre Nom" required>
      </div>
      <br>
      <div class="obligatoire">
        <label for="Adress1">Adress1 :</label>
        <input type="text" name="Adress1" placeholder="Entrez votre Adresse" required>
      </div>
      <br>
      <div class="falcutatif">
        <label for="Adress2">Adress2 :</label>
        <input type="text" name="Adress2" placeholder="Entrez vos informations complémentaires">
      </div>
      <br>
      <div class="obligatoire">
        <label for="Ville">Ville :</label>
        <input type="text" name="Adress3" placeholder="Entrez votre Ville" required>
      </div>
      <br>
      <div class="obligatoire">
        <label for="PostCode">Code postale :</label>
        <input type="text" name="PostCode" placeholder="Entrez votre Code Postal" required>
      </div>
      <br>
      <div class="obligatoire">
        <label for="Phone">Telephone :</label>
        <input type="text" name="Phone" placeholder="Entrez votre Numéro de Téléphone" required>
      </div>
      <br>
      <div class="obligatoire">
        <label for="Email">Email :</label>
        <input type="text" name="Email" placeholder="Entrez votre Adresse Mail" required>
      </div>
      <br>
      <div class="obligatoire">
        <label for="Password">Mot de Passe :</label>
        <input type="password" name="Password" placeholder="Entrez votre Mot de Passe" required>
      </div>
    </fieldset></br>

    <input class="btn-lg btn-primary" type="submit" name="Inscription" value="S'inscrire" /><br><br>
    <a href="authentification.php"><button type="button" class="btn btn-warning"> Déja inscrit ? Connectez-vous</button> </a> <br><br>

    </span>
</form>

<?php
  if(isset($_POST['Inscription']))
  {
    try
    {
       $undlg = new appelBD();
       $custo=$undlg->newCustomer($_POST['Forname'], $_POST['Surname'], $_POST['Adress1'], $_POST['Adress2'], $_POST['Adress3'], $_POST['PostCode'], $_POST['Phone'], $_POST['Email'], 1);
       $customer = $undlg->getCustomerBis($_POST['Forname'], $_POST['Surname']);
       $undlg->newLogin($customer['id'], $_POST['Surname'], $_POST['Password']);
       echo "Votre identifiant et votre Nom";
     }
     catch (Exception $e)
     {
       $erreur = $e->getMessage();
     }

    if(isset($customer['forname']) && isset($customer['surname']))
    {
      foreach ($customer as $key => $value) {
        $_SESSION[$key] = $value;
      }
      print_r($_SESSION);
    }
    else
    {
        echo'<p class="rouge">Données entrées incorrectes !</p>';
    }
  }
?>


<br>

        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Rocher Ludovic - Even Antoine</p></div>
        </footer>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>