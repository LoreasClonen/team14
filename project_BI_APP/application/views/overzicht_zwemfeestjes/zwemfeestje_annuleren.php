<div class="container text-center">
    <div class="row">
        <div class="col-lg-4"></div>
        <div class="col-lg-4">
            <div class="card text-center">
                <div class="card-header">
                    Weet u het zeker?
                </div>
                <div class="card-body">
                    <p class="card-text">Uw zwemfeestje zal geannuleerd worden, weet u het zeker?</p>

                </div>
                <div class="card-footer text-muted">
                    <?php
                        echo anchor('Zwemfeestjes/deleteZwemfeestje/' . $zwemfeestId, 'Bevestigen', 'class="btn btn-primary m-1"');
                        echo anchor('Home/index', 'Annuleren', 'class="btn btn-secondary m-1"');
                    ?>
                </div>
            </div>
        </div>
        <div class="col-lg-4"></div>
    </div>
</div>