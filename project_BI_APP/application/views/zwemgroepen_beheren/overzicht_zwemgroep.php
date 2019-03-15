<div class="col-12 mb-2">
    <?php

        echo '<button>' . anchor("Zwemgroepen/zwemgroepenOphalen", "Terug", "class='nav-link'") . '</button>';

        echo '<h3>Zwemgroep ' . $zwemgroep->groepsnaam . '</h3><hr>';
        echo '<div>Op ' . $zwemgroep->weekdag . ' van ' . date("H:i", strtotime($zwemgroep->beginuur)) . ' tot ' . date("H:i", strtotime($zwemgroep->einduur)) . '.</div>';
        echo '<div>Maximum aantal leerlingen: ' . $zwemgroep->maxGrootte . '</div>';


    echo "<div>Zwemleraar: " . $lesgroep->inlogger->voornaam .' '. $lesgroep->inlogger->achternaam. "</div>";


    ?>
</div>
