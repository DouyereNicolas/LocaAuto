<h1>Location</h1>

<h2>Filtre</h2>
<form action="rechercheLocation" method="post">
<label for="dateStart">Date de début</label>
<input type="date" name="dateStart" id="dateStart" value="<?php if(isset($_SESSION["dateStartLoc"])){echo $_SESSION["dateStartLoc"];}else{echo set_value('dateStart');} ?>"/>
<br>
<label for="dateEnd">Date de fin</label>
<input type="date" name="dateEnd" id="dateEnd" value="<?php if(isset($_SESSION["dateEndLoc"])){echo $_SESSION["dateEndLoc"];}else{echo set_value('dateEnd');} ?>"/>
<br>
<label for="gearBox">boite de vitesse</label>
<select name="gearBox" id="gearBox">
    <option value="">--Please choose an option--</option>
    <option value="manuelle" <?php if(set_value('gearBox') == "manuelle"){echo("selected");};?>>Manuelle</option>
    <option value="automatique" <?php if(set_value('gearBox') == "automatique"){echo("selected");};?>>Automatique</option>
</select>
<br>
<label for="carburant">Carburant</label>
<select name="carburant" id="carburant">
    <option value="">--Please choose an option--</option>
    <option value="essence" <?php if(set_value('carburant') == "essence"){echo("selected");};?>>essence</option>
    <option value="diesel" <?php if(set_value('carburant') == "diesel"){echo("selected");};?>>diesel</option>
</select>
<br>
<label for="nbPorte">Nombre de portes</label>
<select name="nbPorte" id="nbPorte">
    <option value="">--Please choose an option--</option>
    <option value="3" <?php if(set_value('nbPorte') == "3"){echo("selected");};?>>3</option>
    <option value="5" <?php if(set_value('nbPorte') == "5"){echo("selected");};?>>5</option>
</select>
<br>
<label for="nbPlace">Nombre de place</label>
<select name="nbPlace" id="nbPlace">
    <option value="">--Please choose an option--</option>
    <option value="3" <?php if(set_value('nbPlace') == "3"){echo("selected");};?>>3</option>
    <option value="5" <?php if(set_value('nbPlace') == "5"){echo("selected");};?>>5</option>
</select>
<br>

<button type="submit" name="submit" value="all">Rechercher</button>



<br><br>
<button type="submit" name="submit" value="all">All</button>
<button type="submit" name="submit" value="luxe">Luxe</button>
<button type="submit" name="submit" value="sportif">Sportif</button>
<button type="submit" name="submit" value="suv">SUV</button>
</form>
<?php if(isset($_SESSION["dateStartLoc"]) && isset($_SESSION["dateEndLoc"])){ ?>
<table>
    <thead>
        <tr>
            <th>constructeur</th>
            <th>Model</th>
            <th>type</th>
            <th>carburant</th>
            <th>boite de vitesse</th>
            <th>nombre de porte</th>
            <th>nombre de place</th>
            <th>garantie</th>
            <th>Prix par jour</th>
            <th>photo</th>
            <th>location</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($carType as $car) {
            ?> <tr>
                <td><?=$car->constructor?></td>
                <td><?=$car->model?></td>
                <td><?=$car->type?></td>
                <td><?=$car->carburant?></td>
                <td><?=$car->gearbox?></td>
                <td><?=$car->numberDoor?></td>
                <td><?=$car->nbPlace?></td>
                <td><?=$car->garantie?></td>
                <td><?=$car->priceDay?></td>
                <td><?=$car->picture?></td>
                <?php if(isset($_SESSION["dateStartLoc"]) && isset($_SESSION["dateEndLoc"])){ ?><td><a href="LocationCar?id=<?= $car->id_C ?>">Louer cette voiture</a></td><?php } ?>
            </tr>
        <?php }
        ?>
    </tbody>
</table>  <?php }else{ ?>
                <p>Veuillez saisir des dates de location </p>
<?php } ?>