<table class="table">
    <tr>
        <th scope="col">Zwemleraar</th>
        <th scope="col">E-mailadres</th>
        <th class="text-center">Actief</th>
        <th class="text-center">Wijzigen</th>
    </tr>

<?php

echo '<div class="row"><div class="col-4">' . anchor("Home/index", "Terug", "class='btn btn-secondary'") . '</div>
        <div class="col-8 text-right">' . anchor("Gebruiker/toonMijnProfiel", "Mijn profiel", "class='btn btn-info'") . ' ' . anchor("Gebruiker/insertGebruiker",'Nieuwe zwemleraar', 'class="btn btn-primary"') . '</div></div><br>';

foreach ($inloggers as $inlogger) {
    if ($inlogger->isZwemleraar == 1) {

        echo '<tr>
                <td>' . $inlogger->achternaam . ' ' . $inlogger->voornaam . '</td>
                <td>' . $inlogger->email . '</td>
                <td class="text-center">';

        if ($inlogger->actief == 1) {
            echo anchor('Gebruiker/updateGebruikerActiviteit/' . $inlogger->id . '/0', '<i class="far fa-check-circle fa-2x"></i>');
        } else {
            echo anchor('Gebruiker/updateGebruikerActiviteit/' . $inlogger->id . '/1', '<i class="far fa-circle fa-2x"></i>');
        }

        echo '</td>
               <td class="text-center">' . anchor('Gebruiker/getGebruiker/' . $inlogger->id, '<i class="fas fa-edit"></i>') . "</td>
            </tr>";
    }
}

echo '</table>';

?>