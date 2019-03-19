<?php

    echo '<table border="1"">
                <tr>
                    <th>Datum</th>
                    <th>Naam organisator</th> 
                    <th>Tijd</th>
                    <th>Goedgekeurd</th>
                </tr>';

    foreach ($zwemfeestMomenten as $zwemfeestMoment)
    {
        echo "<tr>
                <td>" . anchor('Zwemfeestjes/getZwemfeestje/' . $zwemfeestMoment->id, $zwemfeestMoment->datum) . "</td>
                <td>" . anchor('Zwemfeestjes/getZwemfeestje/' . $zwemfeestMoment->id, $zwemfeestMoment->id) . "</td>
                <td>" . anchor('Zwemfeestjes/getZwemfeestje/' . $zwemfeestMoment->id, date("H:i", strtotime($zwemfeestMoment->beginuur)) . ' - ' .  date("H:i", strtotime($zwemfeestMoment->einduur))) . "</td>
                <td>" . anchor('Zwemfeestjes/getZwemfeestje/' . $zwemfeestMoment->id, $zwemfeestMoment->zwemfeestId) . "</td>
             </tr>";
    }

    echo '</table>';

?>