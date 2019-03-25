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
                <td><?php echo "<i class=\"fas fa-user\"></i> " . $zwemmer->voornaam . " " . $zwemmer->achternaam; ?></td>
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
                <td><?php echo $zwemmer->zwemniveauId->niveauNaam ?></td>
                <td><?php echo "?" ?></td>
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

