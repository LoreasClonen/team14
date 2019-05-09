<?php

$attributes = array('name' => 'overzicht_inlogger', 'id' => 'gebruikerAanpassenFormulier', 'role' => 'form');
echo form_open('Gebruiker/updateGebruiker', $attributes);

echo '<div class="row"><div class="col-12 text-right">' . form_submit(array("value" => "Opslaan", "class" => "btn btn-primary", "id" => "updateGebruiker")) . '</div></div><hr>';

echo $melding;
echo $error;

echo form_label('Naam', 'naam');
echo "\n";
$dataVoornaam = array(
    'id' => 'voornaam',
    'name' => 'voornaam',
    'class' => 'form-control',
    'type' => 'text',
    'value' => $inlogger->voornaam,
    'required' => 'required',
    'size' => '50'
);
$dataAchternaam = array(
    'id' => 'achternaam',
    'name' => 'achternaam',
    'class' => 'form-control',
    'type' => 'text',
    'value' => $inlogger->achternaam,
    'required' => 'required',
    'size' => '50'
);

echo "\n";
echo '<div class="row">' . "\n\t";
echo '<div class="col-3">' . "\n\t\t" . form_input($dataVoornaam) . "\t" . '</div>' . "\n\t";
echo '<div class="col-3">' . "\n\t\t" . form_input($dataAchternaam) . "\t" . '</div>' . "\n";
echo '</div>';

echo form_label('E-mail:', 'email');
$dataEmail = array(
    'id' => 'email',
    'name' => 'email',
    'class' => 'form-control',
    'type' => 'email',
    'value' => $inlogger->email,
    'required' => 'required',
    'size' => '50'
);
echo form_input($dataEmail);

echo form_label('Wachtwoord:', 'poging1');
$dataPoging1 = array(
    'id' => 'poging1',
    'name' => 'poging1',
    'class' => 'form-control',
    'type' => 'password',
    'size' => '50'
);
echo form_password($dataPoging1);

echo form_label('Herhaling wachtwoord:', 'poging2');
$dataPoging2 = array(
    'id' => 'poging2',
    'name' => 'poging2',
    'class' => 'form-control',
    'type' => 'password',
    'size' => '50'
);
echo form_password($dataPoging2);

echo form_label('Tel:', 'telefoonnr');
$dataTel = array(
    'id' => 'telefoonnr',
    'name' => 'telefoonnr',
    'class' => 'form-control',
    'type' => 'tel',
    'value' => $inlogger->telefoonnr,
    'required' => 'required',
    'size' => '50'
);
echo form_input($dataTel);

echo form_label('straatnaam en huisnummer:', 'straatnaam en huisnummer');
$dataStraatnaam = array(
    'id' => 'straatnaam',
    'name' => 'straatnaam',
    'class' => 'form-control',
    'type' => 'text',
    'value' => $inlogger->straatnaam,
    'required' => 'required',
    'size' => '50'
);
$dataHuisnummer = array(
    'id' => 'huisnummer',
    'name' => 'huisnummer',
    'class' => 'form-control',
    'type' => 'text',
    'value' => $inlogger->huisnummer,
    'required' => 'required',
    'size' => '50'
);

echo "\n";
echo '<div class="row">' . "\n\t";
echo '<div class="col-7">' . "\n\t\t" . form_input($dataStraatnaam) . "\t" . '</div>' . "\n\t";
echo '<div class="col-2">' . "\n\t\t" . form_input($dataHuisnummer) . "\t" . '</div>' . "\n";
echo '</div>';

echo form_label('geboortedatum:', 'geboortedatum');
$dataGeboortedatum = array(
    'id' => 'geboortedatum',
    'name' => 'geboortedatum',
    'class' => 'form-control',
    'type' => 'date',
    'value' => $inlogger->geboortedatum,
    'required' => 'required',
    'size' => '50'
);
echo form_input($dataGeboortedatum);

echo form_label('postcode:', 'postcode');
$dataPostcode = array(
    'id' => 'postcode',
    'name' => 'postcode',
    'class' => 'form-control',
    'type' => 'number',
    'value' => $inlogger->postcode,
    'required' => 'required',
    'size' => '50'
);
echo form_input($dataPostcode);

echo form_hidden('id', $inlogger->id);
echo form_hidden('huidigeGebruikersId', $gebruiker->id);
echo form_close();
?>
