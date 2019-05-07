<table class="table">
    <tr>
        <th scope="col">Datum</th>
        <th scope="col">Naam organisator</th>
        <th scope="col">Tijd</th>
        <th scope="col">Goedgekeurd</th>
    </tr>

<?php

echo smallDivAnchor("Home/index", "Terug", "class='btn btn-secondary'") . "<br>";

    foreach ($zwemfeestMomenten as $zwemfeestMoment)
    {
        echo "<tr>
                <td>" . anchor('Zwemfeestjes/getZwemfeestje/' . $zwemfeestMoment->id, zetOmNaarDDMMYYYY($zwemfeestMoment->datum)) . "</td>
                <td>" . $zwemfeestMoment->zwemfeest->voornaam . ' ' . $zwemfeestMoment->zwemfeest->achternaam . "</td>
                <td>" . date("H:i", strtotime($zwemfeestMoment->beginuur)) . ' - ' .  date("H:i", strtotime($zwemfeestMoment->einduur)) . "</td>
                <td>";
        if ($zwemfeestMoment->zwemfeest->isBevestigd == 1) {
            echo "Ja";
        }
        else {
            echo "Nee";
        }
        echo "</td></tr>";
    }

    echo '</table>';

?>