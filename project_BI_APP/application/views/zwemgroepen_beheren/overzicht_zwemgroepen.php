<?php

    echo '<table class="table">
                <tr>
                    <th scope="col">Groepsnaam</th>
                    <th scope="col">Maximum aantal leden</th> 
                </tr>';

    foreach ($zwemgroepen as $zwemgroep)
    {
         echo '<tr>
                    <td>' . anchor('Zwemgroepen/getZwemgroep/' . $zwemgroep->id,  $zwemgroep->groepsnaam) . '</td>
                    <td>' . $zwemgroep->maxGrootte . '</td>
                   </tr>';
    }

    echo '</table>';

    echo smallDivAnchor('Zwemgroepen/zwemgroepToevoegenLaden', 'Zwemgroep toevoegen', 'class="btn btn-primary"');





    ?>