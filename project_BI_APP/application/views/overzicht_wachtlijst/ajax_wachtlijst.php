<?php
echo form_label($wachtlijstTitel, 'wachtlijst' . $wachtlijstId);
$inhoudWachtlijst = array();
foreach ($personenlijst as $persoon) {
    $inhoudWachtlijst[$persoon->klantId] = $persoon->klant->voornaam . " " . $persoon->klant->achternaam;
}
$dataWachtlijst = array(
    'id' => 'wachtlijst' . $wachtlijstId,
    'name' => 'wachtlijst' . $wachtlijstId,
    'class' => 'form-control',
    'size' => 5);
echo form_dropdown($dataWachtlijst, $inhoudWachtlijst);