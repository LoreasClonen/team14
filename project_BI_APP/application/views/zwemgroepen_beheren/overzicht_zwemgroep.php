<div class="col-12 mb-2">
    <?php

        //echo '<button>' . anchor("Zwemgroepen/zwemgroepenOphalen", "Terug", "class='nav-link'") . '</button>';

        echo '<h3>Zwemgroep ' . $zwemgroep->groepsnaam . '</h3><hr>';
        echo '<div>Op ' . $zwemgroep->weekdag . ' van ' . date("H:i", strtotime($zwemgroep->beginuur)) . ' tot ' . date("H:i", strtotime($zwemgroep->einduur)) . '.</div>';
        echo '<div>Maximum ' . $zwemgroep->maxGrootte . ' leerlingen met zwemniveau "' . $zwemniveau->zwemniveau->niveauNaam . '" bij deze zwemgroep.</div>';


        echo "<div>Zwemleraar: " . $inlogger->inlogger->voornaam .' '. $inlogger->inlogger->achternaam. "</div><hr>";

        echo '<h5>Leerlingen:</h5><hr>';

        echo '<table border="1"">
                <tr>
                    <th>Naam</th>
                    <th>Leeftijd</th> 
                </tr>';

        foreach ($beschikbaarheden as $beschikbaarheid) {
            echo '<tr>
                    <th>' . $beschikbaarheid->klant->voornaam . ' ' . $beschikbaarheid->klant->voornaam . '</th>
                    <th>' . $beschikbaarheid->klant->geboortedatum . '</th>
                   </tr>';
        }

        echo '</table>';

    ?>
</div>
