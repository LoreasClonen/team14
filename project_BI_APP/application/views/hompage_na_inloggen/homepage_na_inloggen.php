<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Kempenrust</title>

    <!-- Bootstrap CSS -->
    <?php echo pasStylesheetAan("bootstrap.css"); ?>

    <!-- Custom CSS -->
    <?php echo pasStylesheetAan("buttons.css"); ?>

    <?php echo haalJavascriptOp("jquery-3.3.1.js"); ?>
    <?php echo haalJavascriptOp("bootstrap.bundle.js"); ?>

    <!--        font awesome (CDN) -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
          integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU"
          crossorigin="anonymous">

    <script>
        var site_url = '<?php echo site_url(); ?>';
        var base_url = '<?php echo base_url(); ?>';
    </script>
</head>

<body>
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
                <?php echo anchor("", "Agenda","class = 'nav-link'")?>
            </li>
            <li class="nav-item">
                <?php echo anchor("", "Zwemmers","class = 'nav-link'")?>
            </li>
            <li class="nav-item">
                <?php echo anchor("", "Wachtlijst","class = 'nav-link'")?>
            </li>
            <li class="nav-item">
                <?php echo anchor("", "Zwemgroepen","class = 'nav-link'")?>
            </li>
            <li class="nav-item">
                <?php echo anchor("", "Scholen","class = 'nav-link'")?>
            </li>
            <li class="nav-item">
                <?php echo anchor("", "Schoolfacturen","class = 'nav-link'")?>
            </li>
            <li class="nav-item">
                <?php echo anchor("", "Zwemfeestjes","class = 'nav-link'")?>
            </li>
            <li class="nav-item">
                <?php echo anchor("", "Nieuwsberichten","class = 'nav-link'")?>
            </li>
            <li class="nav-item">
                <?php echo anchor("", "Voorraad producten","class = 'nav-link'")?>
            </li>
            <li class="nav-item">
                <?php echo anchor("", "Aanwezigheden scholen","class = 'nav-link'")?>
            </li>
            <li class="nav-item">
                <?php echo anchor("", "Gebruikers","class = 'nav-link'")?>
            </li>
            <li class="nav-item">
                <?php echo anchor("", "Aanpassingen","class = 'nav-link'")?>
            </li>


        </ul>
    </div>
</nav>

<div class="container my-4">
    <!--            header-->
    <header class="jumbotron">
        <p>Inloggen succesvol!</p>
    </header>

    <hr>

    <!--            footer-->
    <footer>
        <div class="row">
            <div class="col-12">
                <p>Copyright 2018-2019 - Thomas More team14. Alle rechten voorbehouden</p>
            </div>
        </div>
    </footer>
</div>
</body>

</html>
