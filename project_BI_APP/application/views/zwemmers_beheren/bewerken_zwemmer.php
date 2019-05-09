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
        <?php form_open('zwemmer/updateZwemmer');

        $leeftijd = (int)date("Y m d") - (int)$zwemmer->geboortedatum;
        if ($leeftijd == date("Y")) {
            $leeftijd = "/";
        } else {
            $leeftijd = $leeftijd . " jaar";
        }
        $datazwemmer['leeftijd'] = $leeftijd;
        $datazwemmer['naam'] = $zwemmer->voornaam . " " . $zwemmer->achternaam;
        $datazwemmer['niveau'] = $zwemniveau->niveauNaam;

        foreach($zwemgroep as $zwemgroepNaam) {
            $datazwemmer['groep'] .= $zwemgroepNaam->groepsnaam . ' ';
        }

        ?>
        <tr>
<!--            naam -->
            <td>
                <?php echo "<i class=\"fas fa-user\"></i> " . form_label('zwemmer', $datazwemmer);?>
            </td>
<!--            leeftijd -->
            <td>

            </td>
<!--            niveaunaam-->
            <td>
                <?php echo $zwemniveau->niveauNaam ?>
            </td>
<!--            zwemgroep-->
            <td>
                <?php



                ?>
            </td>

        </tr>

        </tbody>
    </table>
</div>