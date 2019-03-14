<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Kempenrust - Zwemgroepen</title>

    <!-- Bootstrap CSS -->
    <?php echo pasStylesheetAan("bootstrap.css"); ?>
    <?php echo pasStylesheetAan("https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css");?>

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


<!--            header-->

<?php echo $hoofding; ?>

<hr>

<!--            pagina-inhoud-->
<div class="row">
    <div class="col-12 mb-2">
        <h2><?php echo $titel; ?></h2>
    </div>
</div>

<div class="row">
    <?php echo $inhoud; ?>
</div>

<hr>

<!--            footer-->
<footer>
    <div class="row">
        <div class="col-12">
            <?php echo $teamleden; ?>
        </div>
    </div>
</footer>

</body>

</html>
