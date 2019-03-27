<div class="col-12 mt-3">
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Naam</th>
            <th scope="col">Leeftijd</th>
            <th scope="col">Niveau</th>
            <th scope="col">Zwemgroep</th>

        </tr>
        </thead>
        <tbody>

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
                        <?php echo $zwemniveau->niveauNaam ?>
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

                </tr>

        </tbody>
    </table>
</div>