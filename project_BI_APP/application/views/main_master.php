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
    <?php echo pasStylesheetAan("footer.css"); ?>
    <?php echo pasStylesheetAan("content.css"); ?>
    <?php echo pasStylesheetAan("overlay.css"); ?>

    <?php echo haalJavascriptOp("jquery-3.3.1.js"); ?>
    <?php echo haalJavascriptOp("bootstrap.bundle.js"); ?>
    <?php echo haalJavascriptOp("menu_toggle.js"); ?>
    <?php echo haalJavascriptOp("overlay.js"); ?>


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
<div class="d-flex" id="wrapper">

    <!--            sidebar-menu-->
    <div class="border-right" id="sidebar-wrapper">
        <?php echo $hoofding; ?>
    </div>
    <!--            pagina-inhoud-->

    <div id="page-content-wrapper">
        <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
            <button class="btn btn-primary" id="menu-toggle">Menu</button>
        </nav>
        <div class="row">
            <div class="container">
                <div class="text-center">
                    <h2><?php echo $titel; ?></h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="container">
                <?php echo $inhoud; ?>
            </div>
        </div>


        <!--            footer-->
        <div class="row">
            <div class="container">
                <footer class="footer">
                    <div class="container-fluid text-muted team-text">
                        <div class='col'>
                            <?php echo $footer ?>
                        </div>
                        <div class="col"
                        <?php echo "<small> " . $teamleden . "</small>" ?>
                    </div>
            </div>
            </footer>
        </div>
    </div>
</div>
</body>

</html>
