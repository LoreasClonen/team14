<div class="modal-header">
    <h4 class="modal-title">Gerecht verwijderen</h4>
    <button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<div class="modal-body">
    <div><p>U staat op het punt om het gerecht "<?php echo $maaltijd->naam; ?>" te verwijderen.</p>
        <p>Bent u zeker dat u dit gerecht wilt verwijderen?</p></div>
</div>
<div class="modal-footer">
    <button type="button" class="btn" data-dismiss="modal">Annuleren</button>
    <?php echo anchor("Zwemfeestjes/maaltijdVerwijderen/" . $maaltijd->id, "Verwijderen", "class='btn btn-primary'") ?>
</div>
