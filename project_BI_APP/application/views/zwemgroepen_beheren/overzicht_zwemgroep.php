<?php




//echo '<li class="nav-item">' . anchor("Zwemgroepen/zwemgroepenOphalen", "Terug", "class='nav-link'") . '</li>';
    //echo '<li class="nav-item">' . anchor("Zwemgroepen/zwemgroepUpdaten", "Toevoegen", "class='nav-link'") . '</li>';

    echo '<h3>' . $zwemgroep->groepsnaam . '</h3>';
    echo '<div>' . $zwemgroep->weekdag . '</div>';
    echo '<div>Van ' . $zwemgroep->beginuur . ' tot ' .$zwemgroep->einduur . '</div>';

?>