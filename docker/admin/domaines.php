<div class="domaines">
    <table>
        <tr>
            <th>Sl Number</th>
            <th>Domain Id</th>
            <th>Domain Name</th>
        </tr>
            <?php
                require("connectdb.php");
                $i = 0;
                $j = 0;
                $reponse = $bdd->query('SELECT * FROM domaines ORDER BY DomainId');
                $taille = $reponse->rowCount();
                if ($taille > 0) {
                    while ($donnes = $reponse->fetch()) {
                        $i++;
                        $j++;
                        $color =(($i%2)==0 ? "sombre" : "clair");
            
                        $domainId = $donnes['DomainId'];
                        $nom = $donnes['DomainName'];
                        ?>
                        <tr>
                            <td class=<?php echo $color ?>> <?php echo $j?></td>
                            <td class=<?php echo $color ?>> <?php echo htmlspecialchars($domainId); ?> </td>
                            <td class=<?php echo $color ?>> <?php echo htmlspecialchars($nom); ?> </td>
                        </tr>
                        <?php
                    }
                }
        ?>
    </table>
</div>
<style>
.domaine {
    font-family: 'open sans', 'Courier', 'monospace';
}

th,
td {
    text-align: center;
    border: 1px solid black;
}

table {
    border-collapse: collapse;
    border-radius: 5px;
    width: 80%;
    margin: 5%;
}

.sombre {
    background-color: rgb(176, 176, 206);
}

.clair {
    background-color: rgb(79, 80, 145);
}

.effectif {
    border-style: solid;
    border-color: #ffaebb;
    width: 220px;
    height: 50px;
    align-content: center;
    text-align: center;
    margin-left: 25%;
}
</style>