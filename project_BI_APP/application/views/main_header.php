<!--        navigatie-->
<nav class="navbar navbar-dark bg-dark navbar-expand-md">
    <a class="navbar-brand" href="<?php echo site_url() ?>">Welkom!</a>
    <button type="button" class="navbar-toggler" data-toggle="collapse"
            data-target="#bs-example-navbar-collapse-1">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">

<?php

            if ($gebruiker == null) { // niet aangemeld
                echo '<li class="nav-item">' . anchor("Inloggen/meldAan", "Inloggen", "class = 'nav-link'") . '</li>';
                echo '<li class="nav-item">' . anchor("Inloggen/nieuwPaswoord", "Nieuw Wachtwoord", "class='nav-link'" ) . '</li>';
                }

            else { // wel aangemeld
                echo anchor('Inloggen/meldAf', 'Afmelden');
                switch ($gebruiker->isAdmin) {
                    case 0: // admin
                        echo '<li class="nav-item">' . anchor("", "Agenda", "class = 'nav-link'") . '</li>';
                        echo '<li class="nav-item">' . anchor("", "Zwememers", "class = 'nav-link'") . '</li>';
                        echo '<li class="nav-item">' . anchor("", "Wachtlijst", "class = 'nav-link'") . '</li>';
                        echo '<li class="nav-item">' . anchor("", "Zwemgroep", "class = 'nav-link'") . '</li>';
                        echo '<li class="nav-item">' . anchor("", "Scholen", "class = 'nav-link'") . '</li>';
                        echo '<li class="nav-item">' . anchor("", "Schoolfacturen", "class = 'nav-link'") . '</li>';
                        echo '<li class="nav-item">' . anchor("", "Zwemfeestjes", "class = 'nav-link'") . '</li>';
                        echo '<li class="nav-item">' . anchor("", "Nieuwsberichten", "class = 'nav-link'") . '</li>';
                        echo '<li class="nav-item">' . anchor("", "Voorraad producten", "class = 'nav-link'") . '</li>';
                        echo '<li class="nav-item">' . anchor("", "Aanwezigheden scholen", "class = 'nav-link'") . '</li>';
                        echo '<li class="nav-item">' . anchor("", "Gebruikers", "class = 'nav-link'") . '</li>';
                        echo '<li class="nav-item">' . anchor("", "Aanpassingen", "class = 'nav-link'") . '</li>';
                        echo anchor("Zwemgroepen/zwemgroepenOphalen", "Zwemgroepen ophalen", "class='nav-link'");
                        break;


                    case 1: // zwemleraar
                        break;
                }
            ?>

        </ul>
    </div>
</nav>


<div class="container my-4">
<header class="jumbotron">
    <h1>Kempenrust</h1>
    <p>Welkom bij zwembad Kempenrust. Hier kan u terecht om makkelijk een zwemles te reserveren of om een zwemfeestje te boeken.</p>

</header>