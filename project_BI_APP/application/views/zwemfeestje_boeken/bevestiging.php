<div class="card-body text-center">
    <h5>Dankjewel!</h5>
    <hr>
    <p class="card-text mt-4">Uw feestje staat geregistreerd.</p>
    <p class="card-text mb-4">U zal een bevestigingsmail ontvangen.</p>

</div>
<div class="card-footer text-muted text-center">
    <?php
        echo anchor('Home/index', 'Hoofdmenu', 'class="btn btn-primary"');
        echo anchor('Zwemfeestjes/emailBevestigingAanvraag/' . $zwemfeestId, 'Gmail', 'class="btn btn-outline-secondary"');
    ?>
</div>
