<?php

require_once('Connexion.php');

class appelBD
{
    function getAdmin($us, $psw){
        try {
          $conn = Connexion::getConnexion();
          $sql = "SELECT id, username FROM admin Where username=:us and password=:psw";
          $sth = $conn->prepare($sql);
          $sth->execute(array(':us' => $us, ':psw' => $psw));
          $utilisateur =$sth->fetch(PDO::FETCH_ASSOC);
          return $utilisateur;
        }
        catch (PDOException $e) {
          $erreur = $e->getMessage();
          }
      }

      function getCategories(){
        try {
          $conn = Connexion::getConnexion();
          $sql = "SELECT * FROM categories";
          $sth = $conn->prepare($sql);
          $sth->execute();
          $categories =$sth->fetchAll(PDO::FETCH_ASSOC);
          return $categories;
        }
        catch (PDOException $e) {
          $erreur = $e->getMessage();
          }
      }
      
      function getCustomer($id){
        try {
          $conn = Connexion::getConnexion();
          $sql = "SELECT * FROM customers Where id=:id";
          $sth = $conn->prepare($sql);
          $sth->execute(array(':id' => $id));
          $customer =$sth->fetch(PDO::FETCH_ASSOC);
          return $customer;
        }
        catch (PDOException $e) {
          $erreur = $e->getMessage();
          }
      }

      function getCustomerBis($forname, $name){
        try {
          $conn = Connexion::getConnexion();
          $sql = "SELECT * FROM customers Where forname=:forname and surname=:surname";
          $sth = $conn->prepare($sql);
          $sth->execute(array(':forname' => $forname, ':surname' => $surname));
          $customer =$sth->fetch(PDO::FETCH_ASSOC);
          return $customer;
        }
        catch (PDOException $e) {
          $erreur = $e->getMessage();
          }
      }



      function newCustomer($forname, $surname, $add1, $add2, $add3, $poste, $phone, $mail, $regis){
        try{
        $conn = Connexion::getConnexion();
        $sql = "INSERT INTO customers values (Null, :forname, :surname, :add1, :add2, :add3, :poste, :phone, :mail, :regis)";
        $sth = $conn->prepare($sql);
        $sth->execute(array(':forname' => $forname, ':surname' => $surname, ':add1' => $add1, ':add2' => $add2, ':add3' => $add3, ':poste' => $poste, ':phone' => $phone, ':mail' => $mail, ':regis' => $regis));
        $customer =$sth->fetch(PDO::FETCH_ASSOC);
        return $customer;
      }
      catch (PDOException $e) {
        $erreur = $e->getMessage();
        }
      }

      function getAdresses($id){
        try {
          $conn = Connexion::getConnexion();
          $sql = "SELECT * FROM delivery_addresses where id=:id";
          $sth = $conn->prepare($sql);
          $sth->execute(array(':id' => $id));
          $categories =$sth->fetch(PDO::FETCH_ASSOC);
          return $categories;
        }
        catch (PDOException $e) {
          $erreur = $e->getMessage();
          }
      }

      function getdelivery_Adresses($id){
        try {
          $conn = Connexion::getConnexion();
          $sql = "SELECT * FROM delivery_addresses where id=:id";
          $sth = $conn->prepare($sql);
          $sth->execute(array(':id' => $id));
          $categories =$sth->fetch(PDO::FETCH_ASSOC);
          return $categories;
        }
        catch (PDOException $e) {
          $erreur = $e->getMessage();
          }
      }

      function addAdress($f, $l, $add, $add2, $c, $poste, $phone, $e){
        try{
        $conn = Connexion::getConnexion();
        $sql = "INSERT INTO delivery_addresses VALUES (NULL, :f, :l, :add, :add2, :c, :poste, :p, :e)";
        $sth = $conn->prepare($sql);
        $sth->execute(array(':f' => $f, ':l' => $l, ':add' => $add, ':add2' => $add2, ':c' => $c, ':poste' => $poste, ':p' => $phone, ':e' => $e));
        $address =$sth->fetch(PDO::FETCH_ASSOC);
        return $address;
      }
      catch (PDOException $e) {
        $erreur = $e->getMessage();
        }
      }

  
      function getLogin($us, $psw){
        try {
          $conn = Connexion::getConnexion();
          $sql = "SELECT id, customer_id, username FROM logins Where username=:us and password=:psw";
          $sth = $conn->prepare($sql);
          $sth->execute(array(':us' => $us, ':psw' => $psw));
          $utilisateur =$sth->fetch(PDO::FETCH_ASSOC);
          return $utilisateur;
        }
        catch (PDOException $e) {
          $erreur = $e->getMessage();
          }
      } 

      function newLogin($id, $username, $password){
        try{
        $conn = Connexion::getConnexion();
        $sql = "INSERT INTO logins values (Null, :id, :username, :password)";
        $sth = $conn->prepare($sql);
        $sth->execute(array(':id' => $id, ':username' => $username, ':password' => $password));
        $login =$sth->fetch(PDO::FETCH_ASSOC);
        return $login;
      }
      catch (PDOException $e) {
        $erreur = $e->getMessage();
        }
      }

      function getOrderItems($id){
        try {
          $conn = Connexion::getConnexion();
          $sql = "SELECT * FROM orderitems where order_id=:id";
          $sth = $conn->prepare($sql);
          $sth->execute(array(':id' => $id));
          $categories =$sth->fetchall(PDO::FETCH_ASSOC);
          return $categories;
        }
        catch (PDOException $e) {
          $erreur = $e->getMessage();
          }
      }

        
      function newOrderItem($o, $p, $q){
        try{
        $conn = Connexion::getConnexion();
        $sql = "INSERT INTO orderitems values (Null, :o, :p, :q)";
        $sth = $conn->prepare($sql);
        $sth->execute(array(':o' => $o, ':p' => $p, ':q' => $q));
        $sth->fetch(PDO::FETCH_ASSOC);
        return ;
      }
      catch (PDOException $e) {
        $erreur = $e->getMessage();
        }
      }

      function getOrders(){
        try {
          $conn = Connexion::getConnexion();
          $sql = "SELECT * FROM orders order by date";
          $sth = $conn->prepare($sql);
          $sth->execute();
          $categories =$sth->fetchAll(PDO::FETCH_ASSOC);
          return $categories;
        }
        catch (PDOException $e) {
          $erreur = $e->getMessage();
          }
      }

      function getOrder($c, $a){
        try {
          $conn = Connexion::getConnexion();
          $sql = "SELECT * FROM orders where customer_id=:c and delivery_add_id=:a and status=1 order by date DESC";
          $sth = $conn->prepare($sql);
          $sth->execute(array(':c' => $c, ':a' => $a));
          $categories =$sth->fetch(PDO::FETCH_ASSOC);
          return $categories;
        }
        catch (PDOException $e) {
          $erreur = $e->getMessage();
          }
      }

  
      function getProducts($catId){
        try {
          $conn = Connexion::getConnexion();
          $sql = "SELECT * FROM products where cat_id=:catId";
          $sth = $conn->prepare($sql);
          $sth->execute(array(':catId' => $catId));
          $categories =$sth->fetchAll(PDO::FETCH_ASSOC);
          return $categories; 
        }
        catch (PDOException $e) {
          $erreur = $e->getMessage();
          }
      }
  
      function getProduct($Id){
        try {
          $conn = Connexion::getConnexion();
          $sql = "SELECT * FROM products where id=:Id";
          $sth = $conn->prepare($sql);
          $sth->execute(array(':Id' => $Id));
          $categories =$sth->fetchAll(PDO::FETCH_ASSOC);
          return $categories;
        }
        catch (PDOException $e) {
          $erreur = $e->getMessage();
          }
      }
      

      function getReviews($catId){
        try {
          $conn = Connexion::getConnexion();
          $sql = "SELECT * FROM reviews where id_product=:catId";
          $sth = $conn->prepare($sql);
          $sth->execute(array(':catId' => $catId));
          $categories =$sth->fetchAll(PDO::FETCH_ASSOC);
          return $categories; 
        }
        catch (PDOException $e) {
          $erreur = $e->getMessage();
          }
      }
}

?>