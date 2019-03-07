<!--        navigatie-->
<nav class="navbar navbar-dark bg-dark navbar-expand-md">
    <a class="navbar-brand" href="<?php echo site_url() ?>">Welkom!</a>
    <button type="button" class="navbar-toggler" data-toggle="collapse"
            data-target="#bs-example-navbar-collapse-1">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
            <li class="nav-item">

                <?php echo anchor("Inloggen/meldAan", "Inloggen","class = 'nav-link'")?>
            </li>
            <li class="nav-item">
                <?php echo anchor("Inloggen/nieuwPaswoord", "Nieuw Wachtwoord", "class='nav-link'" ) ?>
            </li>
            <li class="nav-item">
                <?php echo anchor("Zwemgroepen/zwemgroepenOphalen", "Zwemgroepen ophalen", "class='nav-link'") ?>
            </li>
        </ul>
    </div>
</nav>

<div class="container my-4">
<header class="jumbotron">
    <h1>Kempenrust</h1>
    <p>Welkom bij zwembad Kempenrust. Hier kan u terecht om makkelijk een zwemles te reserveren of om een zwemfeestje te boeken.</p>

</header>