<?php
function MontantGlobal(){
   $total=0;
   for($i = 0; $i < count($_SESSION['panier']['libelleProduit']); $i++)
   {
      $total += $_SESSION['panier']['qteProduit'][$i] * $_SESSION['panier']['prixProduit'][$i];
   }
   return $total;
}


function isVerrouille(){
   if (isset($_SESSION['panier']) && $_SESSION['panier']['verrou'])
     return true;
   else
     return false;
}


function compterArticles()
{
   if (isset($_SESSION['panier']))
     return count($_SESSION['panier']['libelleProduit']);
   else
     return 0;
}

function supprimePanier(){
  unset($_SESSION['panier']);
}

function creationPanier(){
  if (!isset($_SESSION['panier'])){
    $_SESSION['panier']=array();
    $_SESSION['panier']['id'] = array();
    $_SESSION['panier']['image'] = array();
    $_SESSION['panier']['libelleProduit'] = array();
    $_SESSION['panier']['qteProduit'] = array();
    $_SESSION['panier']['prixProduit'] = array();
    $_SESSION['panier']['verrou'] = false;
  }
  return true;
}

function ajouterArticle($id, $image,$libelleProduit,$qteProduit,$prixProduit){

  $positionProduit = array_search($libelleProduit,  $_SESSION['panier']['libelleProduit']);
  if ($positionProduit !== false)
  {
     $_SESSION['panier']['qteProduit'][$positionProduit] += $qteProduit ;
  }
  else
  {
     array_push( $_SESSION['panier']['id'],$id);
     array_push( $_SESSION['panier']['image'],$image);
     array_push( $_SESSION['panier']['libelleProduit'],$libelleProduit);
     array_push( $_SESSION['panier']['qteProduit'],$qteProduit);
     array_push( $_SESSION['panier']['prixProduit'],$prixProduit);
  }

}


function supprimerUnArticle($id, $image,$libelleProduit,$qteProduit,$prixProduit){

      $positionProduit = array_search($libelleProduit,  $_SESSION['panier']['libelleProduit']);
      if ($positionProduit !== false)
      {
          {
            $_SESSION['panier']['qteProduit'][$positionProduit] -= $qteProduit ;

          }
       
      }
        }

function supprimerArticle($libelleProduit){
  $tmp=array();
  $tmp['id'] = array();
  $tmp['image'] = array();
  $tmp['libelleProduit'] = array();
  $tmp['qteProduit'] = array();
  $tmp['prixProduit'] = array();
  $tmp['verrou'] = $_SESSION['panier']['verrou'];

  for($i = 0; $i < count($_SESSION['panier']['libelleProduit']); $i++)
  {
     if ($_SESSION['panier']['libelleProduit'][$i] !== $libelleProduit)
     {
       array_push( $tmp['image'],$_SESSION['panier']['image'][$i]);
        array_push( $tmp['libelleProduit'],$_SESSION['panier']['libelleProduit'][$i]);
        array_push( $tmp['qteProduit'],$_SESSION['panier']['qteProduit'][$i]);
        array_push( $tmp['prixProduit'],$_SESSION['panier']['prixProduit'][$i]);
     }

  }
  $_SESSION['panier'] =  $tmp;
  unset($tmp);

}

function modifierQTeArticle($libelleProduit,$qteProduit){
if (creationPanier() && !isVerrouille())
{
  if ($qteProduit > 0)
  {
     $positionProduit = array_search($libelleProduit,  $_SESSION['panier']['libelleProduit']);

     if ($positionProduit !== false)
     {
        $_SESSION['panier']['qteProduit'][$positionProduit] = $qteProduit ;
     }
  }
  else
  supprimerArticle($libelleProduit);
}
}

 ?>
