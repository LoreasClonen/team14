<?php


$attributes = array('name' => 'overzicht_inlogger', 'id' => 'gebruikerAanpassenFormulier', 'role' => 'form');
echo form_open('Gebruiker/updateGebruiker', $attributes);



echo form_label('Bericht:', 'bericht');
$dataEmail = array(
'id' => 'bericht',
'name' => 'bericht',
'class' => 'form-control',
'type' => 'text',
'value' => $nieuwsbericht->bericht,
'required' => 'required',
'size' => '50'
);
echo form_textarea($dataEmail);

echo form_label('Foto url:', 'foto');
$dataWachtwoord = array(
'id' => 'foto',
'name' => 'foto',
'class' => 'form-control',
'type' => 'text',
'required' => 'required',
'size' => '50'
);
echo form_input($dataWachtwoord);


echo form_hidden('id', $nieuwsbericht->id);
echo form_close();
?>