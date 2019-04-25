<div class="col-12 mb-2">
    <?php
        $attributes = array(
            'data-toggle' => 'tooltip',
            'data-placement' => 'right',
            'title' => 'Klik hier als u meer informatie wilt over de zwemgroep ' . $zwemgroep->groepsnaam
        );


        echo '<div class="row">
                <div class="col-12 text-center"><h2>Zwemgroep ' . $zwemgroep->groepsnaam . '</h2></div>
                <div class="col-4 text-left">' . anchor("Zwemgroepen/zwemgroepenOphalen", "Terug", array('class' => 'btn btn-secondary', 'data-toggle' => 'tooltip', 'data-placement' => 'right', 'title' => 'Klik hier als u terug wilt gaan naar het overzicht van de zwemgroepen.')) . '</div>
                <div class="col-8 text-right">' . anchor("Zwemgroepen/deleteZwemgroep/" . $zwemgroep->id, "Verwijderen", array('class' => 'btn btn-danger', 'data-toggle' => 'tooltip', 'data-placement' => 'bottom', 'title' => 'Klik hier als u de zwemgroep ' . $zwemgroep->groepsnaam . ' wilt verwijderen')) . ' ' . anchor("Wachtlijsten/index", 'Wachtlijst beheren', array('class' => 'btn btn-primary', 'data-toggle' => 'tooltip', 'data-placement' => 'bottom', 'title' => 'Klik hier leerlingen van de wachtlijst wilt halen en toevoegen aan ' . $zwemgroep->groepsnaam . '.')) . '</div>
              </div><hr>';
        echo '<div>Op ' . $zwemgroep->weekdag . ' van ' . date("H:i", strtotime($zwemgroep->beginuur)) . ' tot ' . date("H:i", strtotime($zwemgroep->einduur)) . '.</div>';
        echo '<div>Maximum ' . $zwemgroep->maxGrootte . ' leerlingen met zwemniveau "' . $zwemniveau->zwemniveau->niveauNaam . '" bij deze zwemgroep.</div>';


        echo "<div>Zwemleraar: " . $inlogger->inlogger->voornaam . ' ' . $inlogger->inlogger->achternaam . "</div>\n<hr>";

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
