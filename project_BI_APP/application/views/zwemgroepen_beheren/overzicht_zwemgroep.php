<div class="col-12 mb-2">
    <?php



        echo '<div class="row">
                <div class="col-12 text-center"><h2>Zwemgroep ' . $zwemgroep->groepsnaam . '</h2></div>
                <div class="col-4 text-left">' . anchor("Zwemgroepen/zwemgroepenOphalen", "Terug", "class='btn btn-secondary'") .'</div>
                <div class="col-8 text-right">' . anchor("Zwemgroepen/deleteZwemgroep/" . $zwemgroep->id, "Verwijder", "class='btn btn-danger'") . ' '. anchor("Wachtlijsten/index",'Wachtlijst beheren', 'class="btn btn-primary"') . '</div>
              </div><hr>';
        echo '<div>Op ' . $zwemgroep->weekdag . ' van ' . date("H:i", strtotime($zwemgroep->beginuur)) . ' tot ' . date("H:i", strtotime($zwemgroep->einduur)) . '.</div>';
        echo '<div>Maximum ' . $zwemgroep->maxGrootte . ' leerlingen met zwemniveau "' . $zwemniveau->zwemniveau->niveauNaam . '" bij deze zwemgroep.</div>';


        echo "<div>Zwemleraar: " . $inlogger->inlogger->voornaam .' '. $inlogger->inlogger->achternaam. "</div><hr>";

        echo '<h5>Leerlingen:</h5><hr>';

        echo '<table class="table">
                <tr>
                    <th scope="col">Naam</th>
                    <th scope="col">Geboortedatum</th> 
                </tr>';

        foreach ($beschikbaarheden as $beschikbaarheid) {
            echo '<tr>
                    <td>' . $beschikbaarheid->klant->voornaam . ' ' . $beschikbaarheid->klant->achternaam . '</td>
                    <td>' . zetOmNaarDDMMYYYY($beschikbaarheid->klant->geboortedatum) . '</td>
                   </tr>';
        }

        echo '</table>';

    ?>
</div>
