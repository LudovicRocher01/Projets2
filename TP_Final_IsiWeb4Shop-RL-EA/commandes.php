<!DOCTYPE php>
<?php 
  session_start();
  require_once "php/appelBD.php" ;

  try{
    $undlg = new appelBD();
    $cat = $undlg->getCategories();
    if(isset($_GET['id']))
    {
      $undlg->payementConfirme($_GET['id']);
    }
    $orders = $undlg->getOrders();
    for($i = 0; $i < count($orders); $i++)
    {
      $customer = $undlg->getAdresses($orders[$i]['customer_id']);
      $orders[$i]['customer'] = $customer;
      $address = $undlg->getAdresses($orders[$i]['delivery_add_id']);
      $orders[$i]['address'] = $address;
      $item = $undlg->getOrderItems($orders[$i]['id']);
      $orders[$i]['items'] = $item;
      for($j = 0; $j < count($orders[$i]['items']); $j++)
      {
        $product = $undlg->getProduct($orders[$i]['items'][$j]['id']);
        $orders[$i]['items'][$j]['name'] = $product['name'];
        $orders[$i]['items'][$j]['price'] = $product['price']; 
      }
    }
  }
  catch (Exception $e) 
  {
    $erreur = $e->getMessage();
  }

?>

<head>
		<meta charset="utf-8" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
		<link rel="stylesheet" href="css/formatstyle.css" />
    <title>Commandes ISIWEB4SHOP</title>
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
        
        
        <table>
  <caption>Récapitulatif des commandes clients</caption>
  <thead>
    <tr>
      <th scope="col"> Commande </th>
      <?php 

      for($i = 0; $i < count($orders); $i++) {
        echo "<th scope='col'> commande $i </th>";
      } 
      ?>
      </tr>
  </thead>
  <tbody>

  <tr>
      <th scope="row">Session</th>
      <?php 
for($i = 0; $i < count($orders); $i++) {
  echo "<td>{$orders[$i]['session']}</td>";
} 
?>
    </tr>
    <tr>
      <th scope="row">Enregistrement Client</th>
      <?php 
for($i = 0; $i < count($orders); $i++) {
  if($orders[$i]['registered'] == 1){
    echo "<td scope='col'>Le client est enregistré.</td>";
  }
  else{
    echo "<td scope='col'>Le client n'est pas enregistré.</td>";
  }
} 
?>
</tr>

<tr>
      <th scope="row">Client</th>
      <?php 
for($i = 0; $i < count($orders); $i++) {
  echo "<td> {$orders[$i]['address']['forname']} {$orders[$i]['address']['lastname']} </td>";
} 
?>
</tr>

  <tr>
    <th scope="row">Adresse</th>
      <?php 
for($i = 0; $i < count($orders); $i++) {
  echo "<td> {$orders[$i]['address']['add1']} {$orders[$i]['address']['add2']}, {$orders[$i]['address']['postcode']}, {$orders[$i]['address']['city']} </td>";
} 
?>
    </tr>

  <tr>
    <th scope="row">Téléphone</th>
      <?php 
for($i = 0; $i < count($orders); $i++) {
  echo "<td> {$orders[$i]['address']['phone']} </td>";
} 
?>
    </tr>

    <tr>
      <th scope="row">mail</th>
      <?php 
for($i = 0; $i < count($orders); $i++) {
  echo "<td> {$orders[$i]['address']['email']} </td>";
} 
?>
    </tr>

<tr>
      <th scope="row">Date de la Commande</th>
      <?php 
for($i = 0; $i < count($orders); $i++) {
  echo "<td>{$orders[$i]['date']}</td>";
}
?>
    </tr>

    <tr>
      <th scope="row">Prix total</th>
      <?php 
for($i = 0; $i < count($orders); $i++) {
  echo "<td> {$orders[$i]['total']}€ </td>";
} 
?>

    </tr>

    <tr>
      <th scope="row">Reglement</th>
      <?php 
for($i = 0; $i < count($orders); $i++) {
  if($orders[$i]['payment_type'] == 'cheque')
  {
    echo "<td>Payment par chèque</td>";
  }
  elseif($orders[$i]['payment_type'] == 'paypal')
  {
    echo "<td>Payement par Paypal</td>";
  }
} 
?>
    </tr>

    <tr>
      <th scope="row">Etat commande</th>
      <?php 
for($i = 0; $i < count($orders); $i++) {
  if($orders[$i]['status'] == 0){
    echo "<td>L'utilisateur ajoute toujours des articles à son panier.</td>";
  }
  elseif ($orders[$i]['status'] == 1) {
    echo "<td>Le client a entré son adresse.</td>";
  }
  elseif ($orders[$i]['status'] == 2) {
    echo "<td> L'utilisateur a payé pour l'article.</td>";
  }
  else{
    echo "<td>L'administrateur a confirmé la transaction et envoyé l'élément.</td>";
  }
} 
?>
    </tr>

    

  </tbody>
  <tfoot>
</table>

<br>

        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Rocher Ludovic - Even Antoine</p></div>
        </footer>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>