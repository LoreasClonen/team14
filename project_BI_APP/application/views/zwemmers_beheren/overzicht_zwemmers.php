<div class="container">
    <p><?php echo anchor("Zwemlessen/keuze", "Zwemmer toevoegen", "class='btn btn-primary'"); ?></p>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Naam</th>
            <th scope="col">Leeftijd</th>
            <th scope="col">Niveau</th>
            <th scope="col">Zwemgroep</th>
            <th scope="col" class="text-center">[Acties]</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($zwemmers as $zwemmer) {
            $naam = "<i class=\"fas fa-user\"></i> " . $zwemmer->voornaam . " " . $zwemmer->achternaam;
            $leeftijd = (int)date("Y m d") - (int)$zwemmer->geboortedatum;
            ?>
            <tr>
                <td>
                    <?php echo anchor('Zwemmer/zwemmerOphalen/' . $zwemmer->id, $naam); ?>
                </td>
                <td>
                    <?php
                        if ($leeftijd == date("Y")) {
                            echo " / ";
                        } else {
                            echo $leeftijd . " jaar";
                        }
                    ?>
                </td>
                <td>
                    <?php echo $zwemmer->zwemniveau->niveauNaam; ?>
                </td>
                <td><?php
                        if ($zwemmer->heeftLesgroep) {
                            echo $zwemmer->lesgroep->groepsnaam;
                        } else {
                            echo 'Geen lesgroep';
                        }
                    ?>
                </td>
                <td class="text-center"><?php
                        echo anchor('Zwemmer/zwemmerOphalen/' . $zwemmer->id, "<i class='fas fa-edit'></i>") . " ";
                        echo anchor('Zwemmer/zwemmerOphalen/' . $zwemmer->id, "<i class='fas fa-trash-alt'></i>"); ?>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>

