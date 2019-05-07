<?php

echo '<div class="row"><div class="col-4">' . anchor("Home/index", "Terug", "class='btn btn-secondary'") . '</div>';
echo '<div class="col-8 text-right">' . anchor('Nieuwsberichten/insertNieuwsbericht', 'Nieuwsbericht toevoegen', 'class = "btn btn-primary"') . '</div></div><br>';


echo '<table class="table">
                <tr>
                    <th scope="col">Nieuwsbericht</th>
                    <th scope="col">Wijzigen</th> 
                </tr>';

foreach ($nieuwsberichten as $nieuwsbericht) {
    echo '<tr>
                    <td>' . $nieuwsbericht->bericht . '</td>
                    <td>' . anchor('Nieuwsberichten/nieuwsberichtOphalen/' . $nieuwsbericht->id, '<i class="fas fa-edit"></i> ') . anchor('Nieuwsberichten/deleteNieuwsbericht/' . $nieuwsbericht->id, '<i class="fa fa-trash" aria-hidden="true"></i>') . '</td>
                   </tr>';
}

echo '</table>';

?>