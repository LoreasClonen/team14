<?php echo '<h3 class="col-12 mb-2 text-center">' . $school->schoolnaam . '</h3>';
echo '<div class="col-8">'. anchor("Facturen/getScholen", "Terug", "class='btn btn-primary'") . ' </div><div class="col-4 text-right">' . anchor("Wachtlijsten/index",'Factuur toevoegen', 'class="btn btn-success"') . '</div><hr>';

?>
<table class="table">
    <tr>
        <th scope="col">Factuur</th>
        <th scope="col">Betaald</th>
    </tr>

<?php

    foreach ($facturen as $factuur)
    {
        echo "<tr>
                <td>" . anchor(base_url() . 'application/invoices/' . $factuur->naam, $factuur->naam) . "</td><td>";

            if ($factuur->datumBetaald !== NULL) {
                echo anchor('Facturen/deleteDatumBetaling', '<i class="fa fa-check" aria-hidden="true"></i>') . ' Betaald op ' . zetOmNaarDDMMYYYY($factuur->datumBetaald);
            }
            else {
                echo anchor('Facturen/updateDatumBetaling', '<i class="fa fa-times" aria-hidden="true"></i>');
            }

        echo "</td></tr>";
    }


?>

</table>

