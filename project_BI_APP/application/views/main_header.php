
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>
                    <a href=<?php echo site_url()?>> Welkom!</a>
                </h3>
            </div>
            <ul class="list-unstyled components">
                <?php

                    if ($gebruiker == null) {?>
                    <?php   // niet aangemeld ?>
                      <li>  <?php echo anchor("Inloggen/meldAan", "Inloggen", "class = 'list-group-item list-group-item-action'");?> </li>
                <?php    } else { // wel aangemeld ?>
                            <li class = "active"> <?php echo anchor('Inloggen/meldAf', 'Afmelden', "class = 'list-group-item list-group-item-action'");?> </li>
                            <li>  <?php     echo anchor("", "Agenda", "class = 'list-group-item list-group-item-action'");?> </li>
                            <li>  <?php    echo anchor("Zwemmer/zwemmersOphalen", "Zwemmers", "class = 'list-group-item list-group-item-action'") ;?> </li>
                            <li>  <?php    echo anchor("Wachtlijst/getWachtlijsten", "Wachtlijst", "class = 'list-group-item list-group-item-action'");?> </li>
                            <li>  <?php    echo anchor("Zwemgroepen/zwemgroepenOphalen", "Zwemgroepen", "class = 'list-group-item list-group-item-action'");?> </li>
                    <?php    if ($gebruiker->isAdmin == 1) { ?>
                            <li>  <?php echo anchor("Inloggen/nieuwPaswoord", "Nieuw Wachtwoord", "class='list-group-item list-group-item-action'");?> </li>
                            <li>  <?php echo anchor("", "Scholen", "class = 'list-group-item list-group-item-action'");?> </li>
                            <li>  <?php echo anchor("Facturen/getScholen", "Schoolfacturen", "class = 'list-group-item list-group-item-action'");?> </li>
                            <li>  <?php echo anchor("Zwemfeestjes/getZwemfeestMomenten", "Zwemfeestjes", "class = 'list-group-item list-group-item-action'");?> </li>
                            <li>  <?php echo anchor("", "Nieuwsberichten", "class = 'list-group-item list-group-item-action'");?> </li>
                            <li>  <?php echo anchor("", "Voorraad producten", "class = 'list-group-item list-group-item-action'");?> </li>
                            <li>  <?php echo anchor("Scholen/aanwezighedenIngeven", "Aanwezigheden scholen", "class = 'list-group-item list-group-item-action'");?> </li>
                            <li>  <?php echo anchor("Gebruiker/getGebruikers", "Gebruikers", "class = 'list-group-item list-group-item-action'");?> </li>
                            <li>  <?php echo anchor("", "Aanpassingen", "class = 'list-group-item list-group-item-action'");?> </li>
                      <?php  }
                    }
                ?>
            </ul>
        </nav>



