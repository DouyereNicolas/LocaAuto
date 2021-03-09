
<form  method="post" action="inscrit">


<label for="lastName">Nom de Famille</label>
<input type="text" name="lastName" id="lastName" value="<?= set_value('lastName'); ?>" size="20" />
<p><?php echo form_error('lastName'); ?></p>

<label for="firstName">Prénom</label>
<input type="text" name="firstName" id="firstName" value="<?= set_value('firstName'); ?>" size="20" />
<p><?php echo form_error('firstName'); ?></p>

<label for="login">Nom d'utilisateur</label>
<input type="text" name="login" id="login" value="<?= set_value('login'); ?>" size="20" />
<p><?php echo form_error('login'); ?></p>

<label for="pass">Mot de passe</label>
<input type="text" name="pass" id="pass" value="<?= set_value('pass'); ?>" size="20" />
<p><?php echo form_error('pass'); ?></p>

<label for="passConfirm">Confirmation mot de passe</label>
<input type="text" name="passConfirm" id="passConfirm" value="<?= set_value('passConfirm'); ?>" size="20" />
<p><?php echo form_error('passConfirm'); ?></p>

<label for="email">Email</label>
<input type="text" name="email" id="email" value="<?= set_value('email'); ?>" size="20" />
<p><?php echo form_error('email'); ?></p>

<label for="adress">Adresse</label>
<input type="text" name="adress" id="adress" value="<?= set_value('adress'); ?>" size="20" />
<p><?php echo form_error('adress'); ?></p>

<label for="city">Ville</label>
<input type="text" name="city" id="city" value="<?= set_value('city'); ?>" size="20" />
<p><?php echo form_error('city'); ?></p>

<label for="zipCode">Code Postal</label>
<input type="text" name="zipCode" id="zipCode" value="<?= set_value('zipCode'); ?>" size="20" />
<p><?php echo form_error('zipCode'); ?></p>

<label for="licenceDate">Date d'obtention du permis</label>
<input type="date" name="licenceDate" id="licenceDate" value="<?= set_value('licenceDate'); ?>" size="20" />
<p><?php echo set_value('licenceDate'); ?></p>
<p><?php echo form_error('licenceDate'); ?></p>

<div><input type="submit" value="Submit" /></div>

</form>