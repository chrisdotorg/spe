<div class="liste1">
    <table>
    	<tr>
            <th>Numero</th>
            <th>Id de Domaine</th>
            <th>Email</th>
        </tr>
        <?php
            require("connectdb.php");
            $i = 0;
            $j = 0;
            $reponse = $bdd->query('SELECT * FROM comptes');
            $taille = $reponse->rowCount();
            if ($taille > 0) {
                while ($donnes = $reponse->fetch()) {
                    $i++;
                    $j++;
                    $color =(($i%2)==0 ? "sombre" : "clair");
                    $numero = $donnes['AccountId']; #$j
                    $domainId = $donnes['DomainId'];
                    $email = $donnes['Email'];
                    ?>
                    <tr>
                        <td class=<?php echo $color ?>> <?php echo $j?></td>
                        <td class=<?php echo $color ?>> <?php echo htmlspecialchars($domainId); ?> </td>
                        <td class=<?php echo $color ?>> <?php echo htmlspecialchars($email); ?> </td>
                    </tr>
                    <?php
                }
            }
       ?>
    </table>
</div>