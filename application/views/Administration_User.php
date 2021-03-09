<h1>Profil</h1> 


<p>Nom de famille : <span><?=$user[0]->lastName;?></span></p>
<p>Prénom : <span><?=$user[0]->firstName;?></span></p>
<p>Nom d'utilisateur : <span><?=$user[0]->login;?></span></p>
<p>Mot de passe : <span><?=$_SESSION['password'];?></span></p>
<p>Adresse email : <span><?=$user[0]->mail;?></span></p>
<p>Adresse : <span><?=$user[0]->adress;?></span></p>
<p>Ville : <span><?=$user[0]->city;?></span></p>
<p>Code Postal : <span><?=$user[0]->zipCode;?></span></p>
<p>Année obtention permis : <span><?=$user[0]->licenseDate;?></span></p>

<h1>Location</h1> 

<?php 

    foreach($location as $loc){ ?>
          <p>date de début : <?=$loc->dateStart; ?></p>
          <p>date de fin : <?=$loc->dateEnd; ?></p>
          <p>Kilometrage de départ : <?=$loc->kilometersStart; ?> km</p>
          <p>Kilométrage de fin : <?=$loc->kilometersEnd; ?> km</p>
          <p>Défaut de la voiture : <?=$loc->defectCar; ?></p>
          <p>Location accepter : <?=$loc->acceptLoc; ?></p>  
          <p>Voiture rendu : <?=$loc->returnLoc; ?></p>  
    <?php } //$this->load->view("Inscription");?>