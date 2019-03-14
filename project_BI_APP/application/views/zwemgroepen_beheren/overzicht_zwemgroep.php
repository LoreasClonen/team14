<div class="col-12 mb-2">
    <?php




        echo '<button>' . anchor("Zwemgroepen/zwemgroepenOphalen", "Terug", "class='nav-link'") . '</button>';
        //echo '<button>' . anchor("Zwemgroepen/zwemgroepUpdaten", "Toevoegen", "class='nav-link'") . '</button>';

        echo '<h3>Zwemgroep ' . $zwemgroep->groepsnaam . '</h3><hr>';
        echo '<div>Op ' . $zwemgroep->weekdag . ' van ' . date("H:i", strtotime($zwemgroep->beginuur)) . ' tot ' . date("H:i", strtotime($zwemgroep->einduur)) . '.</div>';

    ?>
</div>
