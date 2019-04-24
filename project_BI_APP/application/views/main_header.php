<!--        navigatie-->
<!--<nav class="navbar navbar-dark bg-dark navbar-expand-md">-->
<!--    <a class="navbar-brand" href="--><?php //echo site_url() ?><!--">Welkom!</a>-->
<!--    <button type="button" class="navbar-toggler" data-toggle="collapse"-->
<!--            data-target="#bs-example-navbar-collapse-1">-->
<!--        <span class="navbar-toggler-icon"></span>-->
<!--    </button>-->

    <div class="bg-light border-right" id="sidebar-wrapper">
        <div class="sidebar-heading"> <a href=<?php echo site_url()?>> Welkom!</a> </div>
        <div class="list-group list-group-flush">
            <?php

                if ($gebruiker == null) { // niet aangemeld
                    echo anchor("Inloggen/meldAan", "Inloggen", "class = 'list-group-item list-group-item-action'");

                } else { // wel aangemeld
                    echo anchor('Inloggen/meldAf', 'Afmelden', "class = 'list-group-item list-group-item-action'");
                    echo anchor("", "Agenda", "class = 'list-group-item list-group-item-action'");
                    echo anchor("Zwemmer/zwemmersOphalen", "Zwemmers", "class = 'list-group-item list-group-item-action'") ;
                    echo anchor("Wachtlijst/getWachtlijsten", "Wachtlijst", "class = 'list-group-item list-group-item-action'");
                    echo anchor("Zwemgroepen/zwemgroepenOphalen", "Zwemgroepen", "class = 'list-group-item list-group-item-action'");
                    if ($gebruiker->isAdmin == 1) {
                        echo anchor("Inloggen/nieuwPaswoord", "Nieuw Wachtwoord", "class='list-group-item list-group-item-action'");
                        echo anchor("", "Scholen", "class = 'list-group-item list-group-item-action'");
                        echo anchor("Facturen/getScholen", "Schoolfacturen", "class = 'list-group-item list-group-item-action'");
                        echo anchor("Zwemfeestjes/getZwemfeestMomenten", "Zwemfeestjes", "class = 'list-group-item list-group-item-action'");
                        echo anchor("", "Nieuwsberichten", "class = 'list-group-item list-group-item-action'");
                        echo anchor("", "Voorraad producten", "class = 'list-group-item list-group-item-action'");
                        echo anchor("Scholen/aanwezighedenIngeven", "Aanwezigheden scholen", "class = 'list-group-item list-group-item-action'");
                        echo anchor("Gebruiker/getGebruikers", "Gebruikers", "class = 'list-group-item list-group-item-action'");
                        echo anchor("", "Aanpassingen", "class = 'list-group-item list-group-item-action'");
                    }
                }
            ?>
            </div>
        </div>



