<h1>Administration Admin</h1>

<?php //var_dump($location); ?>




<table style="text-align:center;">
    <thead>
        <tr>
            <th>Contructeur</th>
            <th>Modele</th>
            <th>Garantie</th>
            <th>Nom du loueur</th>
            <th>Prénom du loueur</th>
            <th>date de début</th>
            <th>date de fin</th>
            <th>Kilometrage de départ</th>
            <th>Kilométrage de fin</th>
            <th>Défaut de la voiture</th>
            <th>Location accepter</th>
            <th>Voiture rendu</th>
            <th>acccepter la loc</th>
            <th>Retour du vehicule</th>
        </tr>
    </thead>
    <tbody>

        <?php foreach ($location as $loc) { ?>
            <tr>
            <td><?= $loc->constructor; ?></td>
            <td><?= $loc->model; ?></td>
            <td><?= $loc->garantie; ?></td>
            <td><?= $loc->lastName; ?></td>
            <td><?= $loc->firstName; ?></td>
            <td><?= $loc->dateStart; ?></td>
            <td><?= $loc->dateEnd; ?></td>
            <td><?= $loc->kilometersStart; ?> km</td>
            <td><?= $loc->kilometersEnd; ?> km</td>
            <td><?= $loc->defectCar; ?></td>
            <td><?= $loc->acceptLoc; ?></td>
            <td><?= $loc->returnLoc; ?></td>
            <td><?php if($loc->acceptLoc == 0){?>
                <a href="<?=base_url();?>AcceptLoc?idLoc=<?=$loc->id;?>">Valider la loc</a>
            <?php } ?></td>
            </tr>
            <td><?php if($loc->returnLoc == 0){?>
                <a href="<?=base_url();?>returnCar?idLoc=<?=$loc->id;?>">Valider le retour</a>
            <?php }else{ ?>
                <a href="<?=base_url();?>annulReturnCar?idLoc=<?=$loc->id;?>">Annuler le retour</a>
           <?php } ?></td>
            </tr>
        <?php } ?>

    </tbody>
</table>