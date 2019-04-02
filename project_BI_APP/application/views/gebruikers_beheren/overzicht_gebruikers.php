<table class="table">
    <tr>
        <th scope="col">Gebruikersnaam</th>
        <th scope="col">E-mailadres</th>
        <th scope="col">Rol</th>
        <th scope="col">Actief</th>
        <th scope="col">Wijzigen</th>
    </tr>

<?php

foreach ($gebruikers as $gebruiker)
{
    echo "<tr>
                <td>" . $gebruiker->voornaam . ' ' . $gebruiker->achternaam . "</td>
                <td>" . $gebruiker->email . "</td><td>";

    if ($gebruiker->isAdmin == 1) {
        echo "Admin";
    }
    else {
        echo "Zwemleraar";
    }

    echo "</td><td>";

    /*if ($gebruiker->actief == 0) {
        echo anchor('Facturen/deleteDatumBetaling/' . $gebruiker->id . '/' . $gebruiker->schoolId, '<i class="far fa-check-circle fa-2x"></i>') . ' Betaald op '. zetOmNaarDDMMYYYY($gebruiker->datumBetaald);
    }
    else {
        echo anchor('Facturen/updateDatumBetaling/' . $gebruiker->id . '/' . $gebruiker->schoolId . '/' . date("Y-m-d", time()), '<i class="far fa-circle fa-2x"></i>');
    }
*/
    echo "</td></tr>";
}

echo '</table>';

?>