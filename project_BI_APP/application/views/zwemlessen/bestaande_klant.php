<?php
$attributes = array('name' => 'bestaandeKlantFormulier', 'id' => 'bestaandeKlantFormulier', 'role' => 'form');
echo form_open('Zwemlessen/checkKlant', $attributes);

echo form_label('voornaam', 'voornaam');
$dataVoornaam = array('id' => 'voornaam',
    'name' => 'voornaam',
    'class' => 'form-control',
    'placeholder' => 'voornaam zwemmer',
    'required' => 'required',
    'size' => '30');
echo form_input($dataVoornaam);

echo form_label('achternaam', 'achternaam');
$dataAchternaam = array('id' => 'achternaam',
    'name' => 'achternaam',
    'class' => 'form-control',
    'placeholder' => 'achternaam zwemmer',
    'required' => 'required',
    'size' => '30');
echo form_input($dataAchternaam);

echo form_label('email', 'email');
$dataEmail = array('id' => 'email',
    'name' => 'email',
    'class' => 'form-control',
    'placeholder' => 'e-mail',
    'required' => 'required',
    'size' => '30');
echo form_input($dataEmail);
echo form_submit(array("value" => "Inschrijven", "class" => "btn btn-primary my-3", "id" => "schrijfIn"));

echo form_close();
?>