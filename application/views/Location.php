<h1>Location</h1>
<a href="Location">All</a>
<a href="Location?type=luxe">Luxe</a>
<a href="Location?type=sportif">Sportif</a>
<a href="Location?type=suv">SUV</a>

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
                <td><?=$car->picture?></td>
                <td><a href="LocationCar?id=<?= $car->id ?>">Louer cette voiture</a></td>
            </tr>
        <?php }
        ?>
    </tbody>
</table>