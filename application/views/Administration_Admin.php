<h1>Administration Admin</h1>

<p>Location en attente de validation</p>
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
            <th>Prix de la location</th>
            <th>Location accepter</th>
            <th>acccepter la loc</th>
            <th>Supprimer la location</th>
        </tr>
    </thead>
    <tbody>

<?php foreach($location as $loc){ 

    if($loc->acceptLoc == 0){ ?>
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
            <td><?= $loc->priceLoc; ?> €</td>
            <td><?= $loc->acceptLoc; ?></td>
            <td><?php if($loc->acceptLoc == 0){?>
                <a href="<?=base_url();?>AcceptLoc?idLoc=<?=$loc->id;?>">Valider la loc</a>
            <?php } ?></td>
            <td> <a href="<?=base_url();?>supprLoc?idLoc=<?=$loc->id;?>">Suprimer la loc</a></td>
            </tr>
    <?php }

} ?>
    </tbody>
</table>

<br>
<br>


<p>Location en attente de Retour</p>
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
            <th>Prix de la location</th>
            <th>Location accepter</th>
            <th>Voiture rendu</th>
            <th>Location Vehicule</th>
            <th>Retour du vehicule</th>
            <th>Supprimer la location</th>
        </tr>
    </thead>
    <tbody>

<?php foreach($location as $loc){ 

    if($loc->returnLoc == 0 && $loc->acceptLoc == 1){ ?>
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
            <td><?= $loc->priceLoc; ?> €</td>
            <td><?= $loc->acceptLoc; ?></td>
            <td><?= $loc->returnLoc; ?></td>
            <td><?php if($loc->acceptLoc == 1){?>
                <a href="<?=base_url();?>annulLoc?idLoc=<?=$loc->id;?>">Annuler la validation de la loc</a>
            <?php } ?></td>
            <td><?php if($loc->returnLoc == 0){?>
                <a href="<?=base_url();?>returnCar?idLoc=<?=$loc->id;?>">Valider le retour</a>
            <?php }else{ ?>
                <a href="<?=base_url();?>annulReturnCar?idLoc=<?=$loc->id;?>">Annuler le retour</a>
           <?php } ?></td>
           <td> <a href="<?=base_url();?>supprLoc?idLoc=<?=$loc->id;?>">Suprimer la loc</a></td>
            </tr>
    <?php }

} ?>

</tbody>
</table>

<p>Ancienne Location</p>
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
            <th>Prix de la location</th>
            <th>Location accepter</th>
            <th>Voiture rendu</th>
            <th>Retour du vehicule</th>
            <th>Supprimer la location</th>
        </tr>
    </thead>
    <tbody>

<?php foreach($location as $loc){ 

    if($loc->returnLoc == 1 && $loc->acceptLoc == 1){ ?>
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
            <td><?= $loc->priceLoc; ?> €</td>
            <td><?= $loc->acceptLoc; ?></td>
            <td><?= $loc->returnLoc; ?></td>
            <td><?php if($loc->returnLoc == 0){?>
                <a href="<?=base_url();?>returnCar?idLoc=<?=$loc->id;?>">Valider le retour</a>
            <?php }else{ ?>
                <a href="<?=base_url();?>annulReturnCar?idLoc=<?=$loc->id;?>">Annuler le retour</a>
           <?php } ?></td>
           <td> <a href="<?=base_url();?>supprLoc?idLoc=<?=$loc->id;?>">Suprimer la loc</a></td>
            </tr>
    <?php }

} ?>

</tbody>
</table>