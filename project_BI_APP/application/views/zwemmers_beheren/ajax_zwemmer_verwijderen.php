<div class="modal-header">
    <h4 class="modal-title">Zwemmer verwijderen</h4>
    <button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<div class="modal-body">
    <div><?php echo "<p>Weet u zeker dat u de zwemmer " . $zwemmer->voornaam . $zwemmer->achternaam . " wilt verwijderen?</p>"; ?></div>
</div>
<div class="modal-footer">
    <button type="button" class="btn" data-dismiss="modal">Annuleren</button>
    <?php echo anchor("zermmer/zwemmerVerwijderen/" . $zwemmer->id, "Verwijderen", "class='btn btn-primary'") ?>
</div>
