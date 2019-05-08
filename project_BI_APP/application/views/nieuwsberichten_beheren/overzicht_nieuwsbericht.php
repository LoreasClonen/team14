<?php


$attributes = array('name' => 'overzicht_nieuwsbericht', 'id' => 'nieuwsberichtAanpassenFormulier', 'role' => 'form');
echo form_open('Nieuwsberichten/updateNieuwsbericht', $attributes);

echo '<div class="row"><div class="col-4">' . anchor("Nieuwsberichten/deleteNieuwsbericht/" . $nieuwsbericht->id, "Verwijderen", "class='btn btn-danger'") . '</div>';
echo '<div class="col-8 text-right">' . form_submit(array("value" => "Opslaan", "class" => "btn btn-primary", "id" => "updateNieuwsbericht")) . '</div></div><hr>';

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

echo smallDivAnchor("Upload/index", "Bladeren", "class='btn btn-secondary'");

echo form_hidden('id', $nieuwsbericht->id);
echo form_close();

?>

