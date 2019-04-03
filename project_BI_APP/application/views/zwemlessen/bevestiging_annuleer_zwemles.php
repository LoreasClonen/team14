<div class="container text-center">
    <div class="row">
        <div class="col-lg-4"></div>
        <div class="col-lg-4">
            <div class="card text-center">
                <div class="card-header">
                    Dankuwel!
                </div>
                <div class="card-body">
                    <p class="card-text">Uw inschrijving is geannuleerd. We hebben u een bevestigingsmail gestuurd.</p>

                </div>
                <div class="card-footer text-muted">
                    <?php echo anchor('Home/index', 'Hoofdmenu', 'class="btn btn-primary"'); ?>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <p><?php echo anchor('Zwemlessen/emailBevestigingAnnuleerZwemles/' . $klantId, 'Gmail', 'class="btn btn-light"'); ?></p>
        </div>
    </div>
</div>