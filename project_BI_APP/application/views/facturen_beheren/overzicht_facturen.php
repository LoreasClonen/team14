<?php

echo '<h3 class="col-12 mb-2 text-center">' . $school->schoolnaam . '</h3><br>';

echo '<div class="row"><div class="col-4">' . anchor("Facturen/getScholen", "Terug", "class='btn btn-secondary'") . '</div>';
echo '<div class="col-8 text-right">' . anchor("Wachtlijsten/index",'Factuur toevoegen', 'class="btn btn-primary"') . '</div></div><br>';


?>
<table class="table">
    <tr>
        <th style="width: 50%">Factuur</th>
        <th style="width: 50%">Betaald</th>
    </tr>

<?php

    foreach ($facturen as $factuur)
    {
        echo "<tr>
                <td>" . anchor(base_url() . 'application/invoices/' . $factuur->naam, $factuur->naam) . "</td><td>";

            if ($factuur->datumBetaald !== NULL) {
                echo anchor('Facturen/deleteDatumBetaling/' . $factuur->id . '/' . $factuur->schoolId, '<i class="far fa-check-circle fa-2x"></i>') . ' Betaald op '. zetOmNaarDDMMYYYY($factuur->datumBetaald);
            }
            else {
                echo anchor('Facturen/updateDatumBetaling/' . $factuur->id . '/' . $factuur->schoolId . '/' . date("Y-m-d", time()), '<i class="far fa-circle fa-2x"></i>');
            }

        echo "</td></tr>";
    }


?>

</table>

