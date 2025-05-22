<?php
 require("connectdb.php");
    if(isset($_POST['submit'])){
        $domain = (isset( $_POST['domain']))? trim( $_POST['domain']) :"";
    }
    else{
        echo"Formulaire mal renseigne. veuillez reprendre";
    }
    $requette = 'SELECT * From domaines WHERE DomainName = ? ';
    $comparant = $bdd->prepare($requette);
    try {
        $comparant->execute(array($domain));
    } catch(PDOException $ex) {
        die('Erreur dans '.basename(__FILE__).' (ligne '.$ex->getLine().') => '.$ex->getMessage());
    }
    if($comparant->rowCount() > 0){
        $drop_req = "DELETE FROM domaines WHERE DomainName= '$domain'";
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
            alert("unexisting domain");
        </script>
     <?php
    }
?>