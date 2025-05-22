<?php
 require("connectdb.php");
    if(isset($_POST['submit'])){
        $email = (isset( $_POST['email']))? trim( $_POST['email']) :"";
    }
    else{
        echo"Formulaire mal renseigne. veuillez reprendre";
    }
    $requette = 'SELECT * From comptes WHERE Email = ? ';
    $comparant = $bdd->prepare($requette);
    try {
        $comparant->execute(array($email));
    } catch(PDOException $ex) {
        die('Erreur dans '.basename(__FILE__).' (ligne '.$ex->getLine().') => '.$ex->getMessage());
    }
    if($comparant->rowCount() > 0){
        $drop_req = "DELETE FROM comptes WHERE Email = '$email'";
        $dro_req = $bdd->prepare($drop_req);
      //  mysql_query($drop_req)
        $dro_req->execute();
        ?>
        <script type="text/javascript">
            alert("sucessful");
        </script>
        <?php
    }else{
        ?>
         <script type="text/javascript">
            alert("unexisting account");
        </script>
     <?php
    }
?>