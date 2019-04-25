<?php

    echo '<table class="table">
                <tr>
                    <th scope="col">Groepsnaam</th>
                    <th scope="col">Maximum aantal leden</th> 
                </tr>';

    foreach ($zwemgroepen as $zwemgroep) {
        $attributes = array(
            'data-toggle' => 'tooltip',
            'data-placement' => 'right',
            'title' => 'Klik hier als u meer informatie wilt over de zwemgroep ' . $zwemgroep->groepsnaam
        );
        echo '<tr>
                    <td>' . anchor('Zwemgroepen/getZwemgroep/' . $zwemgroep->id, $zwemgroep->groepsnaam, $attributes) . '</td>
                    <td>' . $zwemgroep->maxGrootte . '</td>
                   </tr>';
    }

    echo '</table>';

    echo smallDivAnchor('Zwemgroepen/zwemgroepToevoegenLaden', 'Zwemgroep toevoegen', array('class' => 'btn btn-primary', 'data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => 'Klik hier als u een nieuwe zwemgroep wilt toevoegen'));


?>