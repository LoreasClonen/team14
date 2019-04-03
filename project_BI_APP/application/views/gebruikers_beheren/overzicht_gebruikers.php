<table class="table">
    <tr>
        <th scope="col">Zwemleraar</th>
        <th scope="col">E-mailadres</th>
        <th class="text-center">Actief</th>
        <th class="text-center">Wijzigen</th>
    </tr>

<?php

echo '<div class="col-4">' . anchor("Home/index", "Terug", "class='btn btn-secondary'") . '</div>
        <div class="col-8 text-right">' . anchor("Gebruiker/", "Mijn profiel", "class='btn btn-info'") . ' ' . anchor("Gebruiker/",'Nieuwe gebruiker', 'class="btn btn-primary"') . '</div><hr>';

foreach ($gebruikers as $gebruiker) {
    if ($gebruiker->isZwemleraar == 1) {

        echo '<tr>
                <td>' . $gebruiker->achternaam . ' ' . $gebruiker->voornaam . '</td>
                <td>' . $gebruiker->email . '</td>
                <td class="text-center">';

        if ($gebruiker->actief == 1) {
            echo anchor('Gebruiker/gebruikerDeactiveren/' . $gebruiker->id, '<i class="far fa-check-circle fa-2x"></i>');
        } else {
            echo anchor('Gebruiker/gebruikerActiveren/' . $gebruiker->id, '<i class="far fa-circle fa-2x"></i>');
        }

        echo '</td>
               <td class="text-center">' . anchor('Gebruiker/getGebruiker/' . $gebruiker->id, '<i class="fas fa-edit"></i>') . "</td>
            </tr>";
    }
}

echo '</table>';

?>