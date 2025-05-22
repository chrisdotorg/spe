<?php
    $url ="mysql:host=172.20.0.50;dbname=messagerie";
    $user = "user";
    $password = "user";
    try{
        $bdd = new PDO($url,$user,$password);
    }
    catch(Exception $e){
      die($e->getMessage());
    }
?>