<?php
echo form_label($wachtlijstTitel, 'wachtlijst' . $wachtlijstId);
$inhoudWachtlijst = array();
foreach ($personenlijst as $persoon) {
    $inhoudWachtlijst[$persoon->klantId] = $persoon->klant->voornaam . " " . $persoon->klant->voornaam;
}
$dataWachtlijst = array(
    'id' => 'wachtlijst' . $wachtlijstId,
    'name' => 'wachtlijst' . $wachtlijstId,
    'class' => 'form-control');
echo form_multiselect($dataWachtlijst, $inhoudWachtlijst);