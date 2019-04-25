<?php
echo '<div class="container">';

//alle groepen tonen met bepaalde zwemniveau id
$attributes = array('name' => 'keuzeKlant', 'id' => 'keuzeKlant', 'role' => 'form');
echo form_open('Zwemlessen/keuze_zwemlessen_bevestigen/' . $klant->id, $attributes);


//lesgroepId als effectief id dat doorgegeven wordt;
foreach($lesgroepen as $lesgroep) {
    echo "<div class=\"form-check\">";
        $data = array("value" => $lesgroep->id,
            "name" => "gekozenGroepen[]");

        echo form_checkbox($data);

        echo form_label($lesgroep->weekdag . ' ' . $lesgroep->beginuur . ' ' . $lesgroep->einduur, $lesgroep->id);


    echo "</div>";
}
echo "<div class='row text-center'>";

    echo '<div class="col">';
       echo form_submit(array("value" => "Keuze bevestigen", "class" => "btn btn-primary my-3", "id" => "keuzeKlant"));
    echo "</div>";
    echo '<div class="col">';
        echo smallDivAnchor('Zwemlessen/bevestigAnnuleerZwemles', 'Inschrijving annuleren', 'class="btn btn-danger"');
    echo "</div>";

echo "</div>";
echo form_close();


echo '</div>';
?>