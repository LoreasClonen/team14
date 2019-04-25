<?php

echo '<table class="table">
                <tr>
                    <th scope="col">Nieuwsbericht</th>
                    <th scope="col">Wijzigen</th> 
                </tr>';

foreach ($nieuwsberichten as $nieuwsbericht) {
    echo '<tr>
                    <td>' . $nieuwsbericht->bericht . '</td>
                    <td>' . anchor('Nieuwsberichten/nieuwsberichtOphalen/' . $nieuwsbericht->id, '<i class="fas fa-edit"></i>') . '</td>
                   </tr>';
}

echo '</table>';

echo smallDivAnchor('Zwemgroepen/zwemgroepToevoegenLaden', 'Nieuwsbericht toevoegen', 'class = "btn btn-primary"');


?>