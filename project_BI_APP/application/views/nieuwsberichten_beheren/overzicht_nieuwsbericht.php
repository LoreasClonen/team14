<?php


$attributes = array('name' => 'overzicht_inlogger', 'id' => 'gebruikerAanpassenFormulier', 'role' => 'form');
echo form_open('Gebruiker/updateGebruiker', $attributes);



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

echo form_label('Nieuw wachtwoord:', 'wachtwoord');
$dataWachtwoord = array(
'id' => 'wachtwoord',
'name' => 'wachtwoord',
'class' => 'form-control',
'type' => 'password',
'required' => 'required',
'size' => '50'
);
echo form_input($dataWachtwoord);

echo form_label('Herhaal wachtwoord:', 'bevestigingWachtwoord');
$dataBevestigingWachtwoord = array(
'id' => 'bevestigingWachtwoord',
'name' => 'bevestigingWachtwoord',
'class' => 'form-control',
'type' => 'password',
'required' => 'required',
'size' => '50'
);
echo form_input($dataBevestigingWachtwoord);

echo form_hidden('id', $inlogger->id);
echo form_close();
?>