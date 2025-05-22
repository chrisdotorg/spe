<?php

if (isset($_GET['success']) && $_GET['success'] == 1) {
    echo "<script>alert('Successful !');</script>";
}
 require("connectdb.php");
    if(isset($_POST['submit'])){
        $email = (isset( $_POST['email']))? trim( $_POST['email']) :"";
        $password = (isset($_POST['pass'])) ? trim($_POST['pass']) : "";
        $cpass = (isset($_POST['cpass'])) ? trim($_POST['cpass']) : "";
        $email =htmlspecialchars($email);
        $password = htmlspecialchars($password);
    }
    else{
        echo"Refill the form";
    }
    $requette = 'SELECT * From comptes WHERE Email = ? ';
    $comparant = $bdd->prepare($requette);
    try {
        $comparant->execute(array($email));
    } catch(PDOException $ex) {
        die('Erreur dans '.basename(__FILE__).' (ligne '.$ex->getLine().') => '.$ex->getMessage());
    }
    if($comparant->rowCount() > 0){
        ?>
        <script type="text/javascript"> 
            alert("user already in the database");
        </script>
        <?php
    }else{
        $ins_req = "INSERT INTO comptes (DomainId, password, Email) VALUES(?,?,?)";
        $is_req = $bdd->prepare($ins_req);
        try{
            $is_req->execute(array(1,md5($password),$email));
        }catch(PDOException $e1){
            die('Erreur dans '.basename(__FILE__).' (ligne '.$e1->getLine().') => 
            '.$e1->getMessage());
        }
    }
    header("location: index.php?success=1");
    exit;
?>