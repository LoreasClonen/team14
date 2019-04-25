<div class="container">
    <div class = "row">
        <div class="col-2 text-center">
            <?php $form_voogd= 'form_voogd'; ?>
            <?php echo smallDivAnchor('zwemlessen/index/' . $form_voogd , 'Voogd', 'class="btn btn-lg btn-block btn-primary"'); ?>
        </div>
        <div class="col-2 text-center">
            <?php $form_kind = 'form_kind'; ?>
            <?php echo smallDivAnchor('zwemlessen/index/' . $form_kind, 'Kind', 'class="btn btn-lg btn-block btn-primary"'); ?>
        </div>
        <div class="col-6 text-center">
            <?php echo smallDivAnchor('zwemlessen/bestaandeKlant','Al klant?', 'class ="btn btn-lg btn-block btn-primary"'); ?>
        </div>
        <div class="col-2 text-center">
            <?php echo smallDivAnchor('Zwemlessen/gaNaarHelp', 'Help', 'class="btn btn-lg btn-block btn-primary" target="_blank"'); ?>
        </div>
    </div>
</div>