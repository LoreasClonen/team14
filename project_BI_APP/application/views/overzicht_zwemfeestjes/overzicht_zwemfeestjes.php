<table data-toggle="table" data-search="true">
    <thead>
    <tr>
        <th data-sortable="true" scope="col">Datum</th>
        <th data-sortable="true" scope="col">Naam organisator</th>
        <th data-sortable="true" scope="col">Tijd</th>
        <th data-sortable="true" scope="col">Goedgekeurd</th>
    </tr>
    </thead>
    <tbody>

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

    echo '</tbody></table>';

?>