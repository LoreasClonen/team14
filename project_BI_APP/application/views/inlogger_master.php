<!DOCTYPE html>
<html lang="nl">



<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Kempenrust</title>

    <!-- Bootstrap CSS -->
    <?php echo pasStylesheetAan("bootstrap.css"); ?>
    <?php echo pasStylesheetAan("https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css"); ?>

    <!-- Custom CSS -->
    <?php echo pasStylesheetAan("buttons.css"); ?>

    <?php echo pasStylesheetAan("content.css"); ?>
    <?php echo pasStylesheetAan("overlay.css"); ?>
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.14.2/dist/bootstrap-table.min.css">

    <?php echo haalJavascriptOp("jquery-3.3.1.js"); ?>
    <?php echo haalJavascriptOp("bootstrap.bundle.js"); ?>
    <?php echo haalJavascriptOp("menu_toggle.js"); ?>
    <?php echo haalJavascriptOp("overlay.js"); ?>
    <script src="https://unpkg.com/bootstrap-table@1.14.2/dist/bootstrap-table.min.js"></script>

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
<!--            sidebar-menu-->
<div class="wrapper">
    <?php echo $hoofding; ?>

    <!--            pagina-inhoud-->

    <div id="content">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                        <span>Toggle Sidebar</span>
                    </button>

                </div>
            </nav>

            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="text-center">
                            <h2><?php echo $titel; ?></h2>
                            <hr>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <?php if ($gebruiker == null) {
                            echo "<h1> U hebt geen toegang tot deze pagina! Meld u nu aan.</h1>";

                            echo smallDivAnchor("Inloggen/meldAan", "Inloggen", "class='btn btn-primary'");

                        }
                        else{

                        echo $inhoud;
                        } ?>
                    </div>
                </div>
            </div>


            <!--            footer-->
            <div class = 'row' id="footer">
                <div class="container">
                    <div class='row'>
                        <?php echo $footer ?>
                    </div>
                    <div class="row">
                        <?php echo "<small> " . $teamleden . "</small>" ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

</body>

</html>