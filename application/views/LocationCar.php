<h1>Location Car</h1>


<form method="post" action="locationCarFinal" ;>
    <h1>La voiture choisi</h1>
    <p>Constructeur : <?= $car[0]->constructor; ?></p>
    <p>Modele : <?= $car[0]->model; ?></p>
    <p>Type : <?= $car[0]->type; ?></p>
    <p>Carburant : <?= $car[0]->carburant; ?></p>
    <p>Boite de vitesse : <?= $car[0]->gearbox; ?></p>
    <p>nombre de porte : <?= $car[0]->numberDoor; ?></p>
    <p>nombre de place : <?= $car[0]->nbPlace; ?></p>
    <p>Garantie : <?= $car[0]->garantie; ?> €</p>
    <p>Photo : <?= $car[0]->picture; ?></p>



    <h1>Le loueur</h1>

    <p>Nom de famille : <?= $user[0]->lastName; ?></p>
    <p>prénom : <?= $user[0]->firstName; ?></p>
    <p>Adresse Mail : <?= $user[0]->mail; ?></p>
    <p>Adresse complete : <?php echo  $user[0]->adress . " " . $user[0]->zipCode . " " . $user[0]->city; ?></p>
    <p>date d'obtention du permis : <?= $user[0]->licenseDate; ?></p>



    <h1>La reservation</h1>

    <p>Vous souhaitez louer du <?= $_SESSION['dateStartLoc']; ?> au <?= $_SESSION['dateEndLoc']; ?> </p>
    <p> pour un prix total de : <?php echo ($car[0]->priceDay * $date); ?>€ pour <?= $date ?> jours</p>
    <div><button type="submit" name="submit" value="valid">Valider la reservation</button></div>
    <div><button type="submit" name="submit" value="modif">Modifier la reservation</button></div>
    <div><button type="submit" name="submit" value="annul">Annuler la reservation</button></div>

</form>