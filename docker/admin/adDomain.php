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
        ?>
        <script type="text/javascript"> 
            alert("domaine déja existant dans la base de données");
        </script>
        <?php
    }else{
        $ins_req = "INSERT INTO domaines(DomainName) VALUES(?)";
        $is_req = $bdd->prepare($ins_req);
        try{
            $is_req->execute(array($domain));
        }catch(PDOException $e1){
            die('Erreur dans '.basename(__FILE__).' (ligne '.$e1->getLine().') => 
            '.$e1->getMessage());
        }
        ?>
        <script type="text/javascript">
            alert("sucessful");
        </script>
        <?php
    }
?>