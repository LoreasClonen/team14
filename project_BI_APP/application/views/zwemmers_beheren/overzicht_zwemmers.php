<table class="table">
    <thead>
    <tr>
        <th scope="col">Naam</th>
        <th scope="col">Leeftijd</th>
        <th scope="col">Niveau</th>
        <th scope="col">Zwemgroep</th>
        <th scope="col">[Acties]</th>
    </tr>
    </thead>
    <tbody>
    <?php
        foreach ($zwemmers as $zwemmer) {
            ?>
            <tr>
                <td>
                    <?php echo "<i class=\"fas fa-user\"></i> " . $zwemmer->voornaam . " " . $zwemmer->achternaam; ?>
                </td>
                <td>
                    <?php
                        $leeftijd = (int)date("Y m d") - (int)$zwemmer->geboortedatum;
                        if ($leeftijd == date("Y")) {
                            echo "/";
                        } else {
                            echo $leeftijd . " jaar";
                        }
                    ?>
                </td>
                <td>
                    <?php echo $zwemmer->zwemniveau->niveauNaam ?>
                </td>
                <td>
                    <?php
                        if ($zwemmer->beschikbaarheid->statusId == 2) {
                            echo $zwemmer->lesgroep->groepsnaam;
                        } else {
                            echo "Geen lesgroep";
                        }
                    ?>
                </td>
                <td>
                    <i class="fas fa-edit"></i>
                    <i class="fas fa-trash-alt"></i>
                </td>
            </tr>
            <?php
        }
    ?>
    </tbody>
</table>

