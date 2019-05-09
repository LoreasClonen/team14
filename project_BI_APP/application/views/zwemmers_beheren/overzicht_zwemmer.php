<?php echo '<div class="row"><div class="col-4">' . anchor("Home/index", "Terug", "class='btn btn-secondary'") . '</div>'; ?>

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
                            foreach($zwemgroep as $zwemgroepNaam) {
                                echo $zwemgroepNaam->groepsnaam . ' ';
                            }


                        ?>
                    </td>

                </tr>

        </tbody>
    </table>
</div>