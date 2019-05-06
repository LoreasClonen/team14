<?php


$attributes = array('name' => 'overzicht_nieuwsbericht', 'id' => 'nieuwsberichtAanpassenFormulier', 'role' => 'form');
echo form_open('Nieuwsbericht/updateNieuwsbericht', $attributes);

echo form_label('Bericht:', 'bericht');
$dataBericht = array(
'id' => 'bericht',
'name' => 'bericht',
'class' => 'form-control',
'type' => 'text',
'value' => $nieuwsbericht->bericht,
'required' => 'required',
'size' => '50'
);
echo form_textarea($dataBericht);

echo form_label('Foto url:', 'foto');
$dataFoto = array(
'id' => 'foto',
'name' => 'foto',
'class' => 'form-control',
'type' => 'text',
'value' => $nieuwsbericht->foto,
'required' => 'required',
'size' => '50'
);
echo form_input($dataFoto);


echo form_hidden('id', $nieuwsbericht->id);
echo form_close();

echo '<br><div>' . form_submit(array("value" => "Opslaan", "class" => "btn btn-primary", "id" => "updateNieuwsbericht")) . '</div></div><hr>';

?>

